<?php
/**
 * Braspump Theme Functions
 */

if ( ! function_exists( 'braspump_setup' ) ) :
    function braspump_setup() {
        // Add support for block styles
        add_theme_support( 'wp-block-styles' );
        // Add support for full and wide align images
        add_theme_support( 'align-wide' );
        // Add support for responsive embeds
        add_theme_support( 'responsive-embeds' );
        // Add support for editor styles
        add_theme_support( 'editor-styles' );
        // Add support for title tag
        add_theme_support( 'title-tag' );
        // Add support for post thumbnails
        add_theme_support( 'post-thumbnails' );
        
        // WooCommerce Support
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        // Register Menus
        register_nav_menus( array(
            'main-menu' => __( 'Main Menu', 'braspump' ),
            'footer-menu' => __( 'Footer Menu', 'braspump' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'braspump_setup' );

/**
 * Enqueue scripts and styles.
 */
function braspump_scripts() {
    wp_enqueue_style( 'braspump-style', get_stylesheet_uri(), array(), '1.0.5' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800;900&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'braspump_scripts' );

/**
 * WooCommerce Customizations
 */
if ( class_exists( 'WooCommerce' ) ) {
    // Remove WooCommerce default wrappers
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

    add_action('woocommerce_before_main_content', 'braspump_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'braspump_wrapper_end', 10);

    function braspump_wrapper_start() {
        echo '<main class="flex-1 bg-background pt-32 pb-16"><div class="container mx-auto px-6">';
    }

    function braspump_wrapper_end() {
        echo '</div></main>';
    }

    /**
     * Desativa o modo "Coming Soon" / "Em breve" do WooCommerce (8.2+).
     * Isso impede que a mensagem "Grandes coisas estão no horizonte"
     * apareça para visitantes não logados, especialmente no celular.
     */
    add_action( 'init', 'braspump_disable_woocommerce_coming_soon' );
    function braspump_disable_woocommerce_coming_soon() {
        if ( get_option( 'woocommerce_coming_soon' ) !== 'no' ) {
            update_option( 'woocommerce_coming_soon', 'no' );
        }
    }
}

/**
 * Simple Menu Walker to maintain classes (Placeholder)
 */
class Braspump_Menu_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        
        $output .= '<a href="' . $item->url . '" class="text-[13px] font-black tracking-wider text-white hover:text-brand-gold transition">';
        $output .= $item->title;
        $output .= '</a>';
    }
}

/**
 * Remove o atributo Voltagem especificamente para o produto Unidade Suctora
 * E auto-seleciona a primeira opção para não travar o botão de compra
 */
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'braspump_hide_voltage_for_suctors', 10, 2 );
function braspump_hide_voltage_for_suctors( $html, $args ) {
    if ( is_product() ) {
        global $post;
        // Regra para Unidade Suctora (Esconde Voltagem)
        if ( $post->post_name === 'unidade-suctora' && strpos( $args['attribute'], 'voltagem' ) !== false ) {
            $html .= '<style>.variations tr:has(select[name*="voltagem"]) { display: none !important; }</style>';
            $html .= '<script>jQuery(document).ready(function($) { $("select[name*=\'voltagem\']").val($("select[name*=\'voltagem\'] option:eq(1)").val()).change(); });</script>';
        }
        
        // Regra para Turbo VAC (Esconde Capa, se existir)
        if ( $post->post_name === 'bomba-de-vacuo-turbo-vac' && strpos( $args['attribute'], 'capa' ) !== false ) {
            $html .= '<style>.variations tr:has(select[name*="capa"]) { display: none !important; }</style>';
            $html .= '<script>jQuery(document).ready(function($) { $("select[name*=\'capa\']").val($("select[name*=\'capa\'] option:eq(1)").val()).change(); });</script>';
        }
    }
    return $html;
}

/**
 * Fallback de imagens para produtos sem imagem cadastrada no WooCommerce.
 * Mapeia o slug de cada produto para a imagem correspondente na pasta /images/ do tema.
 * Isso corrige os ícones de "sem imagem" na página /shop no celular e desktop.
 */
add_filter( 'woocommerce_product_get_image', 'braspump_product_image_fallback', 10, 5 );
function braspump_product_image_fallback( $image, $product, $size, $attr, $placeholder ) {
    // Se o produto já tem uma imagem cadastrada, não faz nada
    if ( has_post_thumbnail( $product->get_id() ) ) {
        return $image;
    }

    // Mapeamento de slug do produto → arquivo de imagem no tema
    $slug_image_map = array(
        'bomba-de-vacuo-bc2-linha-carbon' => 'BC2-C-CAPA.webp',
        'bomba-de-vacuo-bc4-linha-carbon' => 'BC4-C-CAPA.webp',
        'bomba-de-vacuo-turbo-light'      => 'Turbo-Light-C-capa.webp',
        'bomba-de-vacuo-turbo-light-sc'   => 'Turbo-Light-SC.webp',
        'bomba-de-vacuo-turbo-max'        => 'Turbo-Max.webp',
        'bomba-de-vacuo-turbo-vac'        => 'Turbo-VAC.webp',
        'unidade-suctora'                 => 'unidade-suctora-mdelo-gp.webp',
    );

    $slug = $product->get_slug();

    if ( isset( $slug_image_map[ $slug ] ) ) {
        $img_url = get_template_directory_uri() . '/images/' . $slug_image_map[ $slug ];
        return '<img src="' . esc_url( $img_url ) . '" 
                     alt="' . esc_attr( $product->get_name() ) . '" 
                     class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" 
                     loading="lazy"
                     style="width:100%; height:auto; object-fit:contain;" />';
    }

    return $image;
}

/**
 * Fallback também para a galeria na página individual do produto.
 */
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'braspump_single_product_image_fallback', 10, 2 );
function braspump_single_product_image_fallback( $html, $attachment_id ) {
    // Só atua se não há imagem (html contém o placeholder)
    if ( $attachment_id || ! is_product() ) {
        return $html;
    }

    global $post;

    $slug_image_map = array(
        'bomba-de-vacuo-bc2-linha-carbon' => 'BC2-C-CAPA.webp',
        'bomba-de-vacuo-bc4-linha-carbon' => 'BC4-C-CAPA.webp',
        'bomba-de-vacuo-turbo-light'      => 'Turbo-Light-C-capa.webp',
        'bomba-de-vacuo-turbo-light-sc'   => 'Turbo-Light-SC.webp',
        'bomba-de-vacuo-turbo-max'        => 'Turbo-Max.webp',
        'bomba-de-vacuo-turbo-vac'        => 'Turbo-VAC.webp',
        'unidade-suctora'                 => 'unidade-suctora-mdelo-gp.webp',
    );

    $slug = $post->post_name;

    if ( isset( $slug_image_map[ $slug ] ) ) {
        $img_url = get_template_directory_uri() . '/images/' . $slug_image_map[ $slug ];
        return '<div class="woocommerce-product-gallery__image">
                    <img src="' . esc_url( $img_url ) . '" 
                         alt="' . esc_attr( get_the_title() ) . '"
                         style="width:100%; height:auto; object-fit:contain; max-height:500px;" />
                </div>';
    }

    return $html;
}

/**
 * Adiciona campos de CPF, Número e Bairro no Checkout do WooCommerce
 */
add_filter( 'woocommerce_checkout_fields', 'braspump_add_brazilian_checkout_fields' );
function braspump_add_brazilian_checkout_fields( $fields ) {
    // Adiciona o campo de CPF
    $fields['billing']['billing_cpf'] = array(
        'label'       => 'CPF',
        'placeholder' => '000.000.000-00',
        'required'    => true,
        'class'       => array( 'form-row-wide' ),
        'clear'       => true,
        'priority'    => 25,
    );

    // Adiciona Número do endereço
    $fields['billing']['billing_number'] = array(
        'label'       => 'Número',
        'placeholder' => 'Nº',
        'required'    => true,
        'class'       => array( 'form-row-first' ),
        'clear'       => false,
        'priority'    => 51,
    );

    // Adiciona Bairro
    $fields['billing']['billing_neighborhood'] = array(
        'label'       => 'Bairro',
        'placeholder' => 'Bairro',
        'required'    => true,
        'class'       => array( 'form-row-last' ),
        'clear'       => true,
        'priority'    => 52,
    );

    return $fields;
}

/**
 * Validação do CPF no Checkout
 */
add_action('woocommerce_checkout_process', 'braspump_validate_cpf_checkout');
function braspump_validate_cpf_checkout() {
    if ( ! empty( $_POST['billing_cpf'] ) ) {
        $cpf = preg_replace('/[^0-9]/', '', $_POST['billing_cpf']);
        if (strlen($cpf) != 11) {
            wc_add_notice( 'Por favor, insira um CPF válido.', 'error' );
        }
    }
}

/**
 * Salva os campos personalizados no pedido
 */
add_action( 'woocommerce_checkout_update_order_meta', 'braspump_save_brazilian_checkout_fields' );
function braspump_save_brazilian_checkout_fields( $order_id ) {
    if ( ! empty( $_POST['billing_cpf'] ) ) {
        update_post_meta( $order_id, '_billing_cpf', sanitize_text_field( $_POST['billing_cpf'] ) );
        update_post_meta( $order_id, 'billing_cpf', sanitize_text_field( $_POST['billing_cpf'] ) );
    }
    if ( ! empty( $_POST['billing_number'] ) ) {
        update_post_meta( $order_id, '_billing_number', sanitize_text_field( $_POST['billing_number'] ) );
    }
    if ( ! empty( $_POST['billing_neighborhood'] ) ) {
        update_post_meta( $order_id, '_billing_neighborhood', sanitize_text_field( $_POST['billing_neighborhood'] ) );
    }
}

/**
 * Exibe os campos na administração do pedido (WP-Admin)
 */
add_filter( 'woocommerce_admin_billing_fields', 'braspump_admin_billing_fields' );
function braspump_admin_billing_fields( $fields ) {
    $fields['cpf'] = array(
        'label' => 'CPF',
        'show'  => true,
    );
    $fields['number'] = array(
        'label' => 'Número',
        'show'  => true,
    );
    $fields['neighborhood'] = array(
        'label' => 'Bairro',
        'show'  => true,
    );
    return $fields;
}
