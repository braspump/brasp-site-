<?php 
require_once("wp-load.php"); 
require_once(ABSPATH . "wp-admin/includes/plugin-install.php"); 
require_once(ABSPATH . "wp-admin/includes/file.php"); 
require_once(ABSPATH . "wp-admin/includes/misc.php"); 
require_once(ABSPATH . "wp-admin/includes/plugin.php"); 

$plugin_slug = "woocommerce-extra-checkout-fields-for-brazil";

echo "Instalando Brazilian Market on WooCommerce...\n";

if (is_plugin_active($plugin_slug . "/" . $plugin_slug . ".php")) {
    echo "O plugin ja esta ativo!";
    exit;
}

$api = plugins_api("plugin_information", array("slug" => $plugin_slug));
if (is_wp_error($api)) {
    echo "Erro ao buscar informacoes do plugin.";
    exit;
}

$status = install_plugin_install_status($api);
if ($status["status"] == "install") {
    $upgrader = new Plugin_Upgrader(new Automatic_Upgrader_Skin());
    $install = $upgrader->install($api->download_link);
    if (is_wp_error($install)) {
        echo "Erro na instalacao.";
        exit;
    }
}

activate_plugin($plugin_slug . "/" . $plugin_slug . ".php");
echo "✅ Plugin instalado e ativo com sucesso!";
unlink(__FILE__);
