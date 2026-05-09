<?php
/*
  Plugin Name: Transportadora Braspress API - Loja5
  Description: Integração a transportadora Braspress
  Version: 2.0
  Author: Loja5.com.br
  Author URI: http://www.loja5.com.br
  Copyright: © 2009-2024 Loja5.com.br.
  License: Comercial
*/

//dir do plugin 
define('LOJA5_WOO_BRASPRESS_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ));
define('LOJA5_WOO_BRASPRESS_EXIBIR_FORM_TODOS', true);
define('LOJA5_WOO_BRASPRESS_FISCAL_FICTICIO_CLIENTE', '11111111111111');//simulacoes

if ( ! class_exists( ' WC_Loja5_Braspress' ) ) {
    
class WC_Loja5_Braspress {
    
    protected static $instance = null;
    
    private function __construct() {
		//init
        $this->init();
        add_filter( 'woocommerce_shipping_methods', array( $this, 'include_methods' ) );
		add_filter('woocommerce_after_shipping_rate', array($this,'prazo_de_entrega_carrinho'), 100);
		add_action( 'woocommerce_view_order', array( $this, 'rastreamento_cliente' ), 20 );
		//hpos
		add_action('before_woocommerce_init', function(){
			if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
				\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
			}
		});
		//admin
		if(is_admin()){
			//box
			if(get_option('woocommerce_custom_orders_table_enabled')=='yes'){
				add_action( 'add_meta_boxes', function(){
					add_meta_box(
						'wc_loja5_braspress',
						'Rastreamento Braspress',
						array( $this, 'metabox2' ),
						wc_get_page_screen_id( 'shop-order' ),
						'side',
						'high'
					);
				});
			}else{
				add_action('add_meta_boxes', function(){
					add_meta_box(
						'wc_loja5_braspress',
						'Rastreamento Braspress',
						array( $this, 'metabox1' ),
						'shop_order',
						'side',
						'default'
					);
				});
			}
			add_action( 'save_post', array( $this, 'salvar_nfe' ) );
			//alerta atualizacao
			add_action( 'load-index.php', 
				function(){
					add_action( 'admin_notices', array( $this, 'api_alerta_atualizacao' ) );
				}
			);
			//alerta
			if(!file_exists(LOJA5_WOO_BRASPRESS_DIR.'/include/licenciamento.php')){
				//alerta licencimento
				add_action( 'admin_notices', array( $this, 'alerta_licenciamento' ) );
			}
		}
    }
	
	public function alerta_licenciamento(){
		echo '<div class="error">';
		echo '<p><strong>[Braspress Loja5]:</strong> Existe um problema no arquivo de li&ccedil;enciamento ('.LOJA5_WOO_BRASPRESS_DIR.'/include/licenciamento.php) do plugin em sua loja, aparentemente o mesmo n&atilde;o foi enviado ou esta sendo removido por sua hospedagem, <a href="https://loja5.zendesk.com/hc/pt-br/articles/5147862975117-Problema-de-Alerta-de-Arquivos-com-Eval-Base64-no-Wordfence-Sucuri-Cpanel-CPGuard-e-Outros" target="_blank">clique aqui</a> e siga as instru&ccedil;&otilde;es!</p>';
		echo '</div>';
	}
	
	public function api_alerta_atualizacao(){
		//verifica a licença
		$config = new Loja5_Shipping_Braspress_Legacy();
		$serial = $config->settings['serial'];
		$key_string = trim($serial);
		if(isset($key_string) && !empty($key_string)){
			$validas[] = $key_string;
			//curl
			$dados = json_encode($validas);
			$service_url = 'https://www.loja5.com.br/index.php?route=module/iono/buscar';
			$curl = curl_init($service_url);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); 
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' .strlen($dados))
			); 
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $dados);
			$json = json_decode(curl_exec($curl),true);
			$curlErrno     = curl_errno($curl);
			$curlErr       = curl_error($curl);
			curl_close($curl);
		}
		if(isset($json['atualizados'][0])){
			$up = $json['atualizados'][0];
			echo '<div class="notice notice-info">';
			echo '<p><span style="background: #03A9F4; color: #FFF; border-radius: 2px; padding: 3px;"><b>[BRASPRESS LOJA5]</b></span> O seu plugin <b>'.$up['modulo'].'</b> foi atualizado em <b>Loja5.com.br</b>, <a href="https://www.loja5.com.br/account/download.html" target="_blank">acesse sua conta > downloads</a> e baixe o mesmo at&eacute; <b>'.$up['validade'].'</b>.</p>';
			echo '</div>';
		}
	}
	
	public function rastreamento_cliente($order_id) {
		$order = wc_get_order( $order_id );
		if($order){
			$config = new Loja5_Shipping_Braspress_Legacy();
			$notas = get_post_meta($order->get_id(),'_braspress_nota_fiscal',true);
			if(!empty($notas)){
				$lista_notas = explode(',',$notas);
				$links_notas = array();
				foreach($lista_notas as $nota){
					$links_notas[] = '<a href="https://blue.braspress.com/site/w/tracking/search?cnpj='.preg_replace('/\D/', '', $config->settings['cnpj']).'&documentType=NOTAFISCAL&numero='.$nota.'" target="_blank">'.$nota.'</a>';
				}
				include_once(dirname(__FILE__).'/classes/rastreamento_nfe.php');
			}
		}
	}
	
	public function metabox1($post){
		if(isset($post->post_type) && $post->post_type=='shop_order'){
			$order = wc_get_order( $post->ID );
			$metodos_braspress = 0;
			foreach ( $order->get_shipping_methods() as $shipping_method ) {
				if($shipping_method->get_method_id()=='braspress-r' || $shipping_method->get_method_id()=='braspress-a'){
					$metodos_braspress++;
				}
			}
			if($metodos_braspress > 0 || LOJA5_WOO_BRASPRESS_EXIBIR_FORM_TODOS){
				$notas = get_post_meta($order->get_id(),'_braspress_nota_fiscal',true);
				$email = (bool)get_post_meta($order->get_id(),'_braspress_email_enviado',true);
				include_once(dirname(__FILE__).'/classes/form_nfe.php');
			}else{
				echo '<style>#wc_loja5_braspress{display:none;}</style>';
			}
		}
	}
	
	public function metabox2($post_or_order_object){
		global $wpdb;
		$order = ( $post_or_order_object instanceof WP_Post ) ? wc_get_order( $post_or_order_object->ID ) : $post_or_order_object;
		if ( ! $order ) {
			return;
		}
		$post = new stdClass();
		$post->ID = $order->get_id();
		$post->post_type = 'shop_order';
		if(isset($post->post_type) && $post->post_type=='shop_order'){
			$order = wc_get_order( $post->ID );
			$metodos_braspress = 0;
			foreach ( $order->get_shipping_methods() as $shipping_method ) {
				if($shipping_method->get_method_id()=='braspress-r' || $shipping_method->get_method_id()=='braspress-a'){
					$metodos_braspress++;
				}
			}
			if($metodos_braspress > 0 || LOJA5_WOO_BRASPRESS_EXIBIR_FORM_TODOS){
				$notas = get_post_meta($order->get_id(),'_braspress_nota_fiscal',true);
				$email = (bool)get_post_meta($order->get_id(),'_braspress_email_enviado',true);
				include_once(dirname(__FILE__).'/classes/form_nfe.php');
			}else{
				echo '<style>#wc_loja5_braspress{display:none;}</style>';
			}
		}
	}
	
	public function conteudo_email($dados) {
		return wc_get_template_html(
			'/emails/dados-nfe.php', 
			$dados, 
			'', 
			LOJA5_WOO_BRASPRESS_DIR
		);
	}
	
	public function enviar_email($mensagem,$titulo,$cabecalho,$para,$cliente,$order){
		$mailer = WC()->mailer();
		$dados = array();
		$dados['email'] = $mailer;
		$dados['mensagem'] = $mensagem;
		$dados['order'] = $order;
		$dados['email_heading'] = $cabecalho;
		$dados['nome'] = $cliente;
		$conteudo = $this->conteudo_email($dados);
		$headers = "Content-Type: text/html\r\n";
		$mailer->send($para,$titulo,$conteudo,$headers);	
	}
	
	public function salvar_nfe($post){
		if(isset($_POST['post_type']) && isset($_POST['ID']) && isset($_POST['braspress_nota_fiscal']) && $_POST['post_type']=='shop_order'){
			//order 
			$order = wc_get_order((int)$_POST['ID']);
			if(!$order){
				return;
			}
			//salva a nfe no meta do pedido
			$order->update_meta_data('_braspress_nota_fiscal', trim($_POST['braspress_nota_fiscal']));
			//faz o envio do e-mail 
			$notas = $order->get_meta('_braspress_nota_fiscal',true);
			if($order && !empty($notas)){
				//config do braspress 
				$config = new Loja5_Shipping_Braspress_Legacy();
				//monta os links das notas
				$lista_notas = explode(',',$notas);
				$links_notas = array();
				foreach($lista_notas as $nota){
					$links_notas[] = '<a href="https://blue.braspress.com/site/w/tracking/search?cnpj='.preg_replace('/\D/', '', $config->settings['cnpj']).'&documentType=NOTAFISCAL&numero='.$nota.'" target="_blank">'.$nota.'</a>';
				}
				//dados do e-mail
				$cliente = $order->get_billing_first_name();
				$email = $order->get_billing_email();
				$titulo = '['.wp_specialchars_decode(get_option('blogname'), ENT_QUOTES).'] Seu pedido foi Enviado!';
				$mensagem = 'Seu pedido foi postado junto a transportadora Braspress, o mesmo pode ser rastreado abaixo clicando na NFe correspondente.<br>Envios: '.implode(', ',$links_notas).'<br><br>Qualquer duvida ou informação sobre o envio entre em contato com o atendimento da loja.';
				$this->enviar_email($mensagem,$titulo,'NFe Braspress - Enviado',$email,$cliente,$order);
				//salva um meta como email enviado
				$order->update_meta_data('_braspress_email_enviado', true);
			}
		}
	}
	
	public function init() {
		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
			include_once(dirname(__FILE__).'/classes/abstract-braspress.php');
			include_once(dirname(__FILE__).'/classes/metodos-braspress.php');
		}else{
			add_action( 'admin_notices', array( $this, 'alerta_versao' ) );
		}
	}
	
	public function prazo_de_entrega_carrinho( $metodo ) {
		$metas = $metodo->get_meta_data();
		$label = '';
		if(isset($metas['_prazo_braspress']) && !empty($metas['_prazo_braspress'])){
			$label .= '<br /><small>';
			$label .= sprintf( __( 'Entrega em até %s dia(s) úteis.', 'loja5-woo-braspress' ), $metas['_prazo_braspress'] );
			$label .= '</small>';
		}
		echo $label;
	}
	
	public function prazo_de_entrega_pedido( $name, $order ) {
		$names = array();
		foreach ( $order->get_shipping_methods() as $shipping_method ) {
			$prazo = (int) $shipping_method->get_meta( '_prazo_braspress' );
			if ( $prazo ) {
				$names[] = sprintf( __( '%s (entrega em até %s dia(s) úteis)', 'loja5-woo-braspress' ), $shipping_method->get_name(), $prazo );
			} else {
				$names[] = $shipping_method->get_name();
			}
		}
		return implode( ', ', $names );
	}
    
    public function alerta_versao(){
        echo '<div class="error">';
        echo '<p><strong>Transportadora Braspress [Loja5]:</strong> Requer vers&atilde;o Woo 3.x ou superior, atualize seu Woo para vers&atilde;o compativel!</p>';
        echo '</div>';
    }
	
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
	
	public function include_methods( $methods ) {        
        if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
            $methods['braspress-legacy'] = 'Loja5_Shipping_Braspress_Legacy';
            $methods['braspress-r'] = 'Loja5_Shipping_Braspress_R';
            $methods['braspress-a'] = 'Loja5_Shipping_Braspress_A';
        }
		return $methods;
	}
}

add_action( 'plugins_loaded', array( 'WC_Loja5_Braspress', 'get_instance' ) );
}
?>