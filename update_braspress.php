<?php 
require_once("wp-load.php"); 
$options = array(
    "enabled" => "yes",
    "serial" => "9664-16718-148-22092023-4WAB-LOJA5",
    "login" => "SCALARIESCALARI_PRD",
    "senha" => "YdL5QEG48u34QKeP",
    "cnpj" => "02820874000110",
    "cep" => "13903340",
    "ambiente" => "0",
    "frete_tipo" => "1",
    "exibir_prazo" => "titulo",
    "debug" => "yes"
);
update_option("woocommerce_braspress-api-loja5_settings", $options);
echo "Configuracoes Braspress atualizadas com sucesso via DB!";
unlink(__FILE__);
