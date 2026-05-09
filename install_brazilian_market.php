<?php
require_once("wp-load.php");

$url = "https://downloads.wordpress.org/plugin/woocommerce-extra-checkout-fields-for-brazil.latest-stable.zip";
$zipFile = "plugin.zip";
$extractPath = WP_PLUGIN_DIR;

echo "<h1>Instalador de Plugin Brasileiro</h1>";

// 1. Download
echo "Baixando plugin... ";
$ch = curl_init($url);
$fp = fopen($zipFile, "w+");
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_exec($ch);
curl_close($ch);
fclose($fp);
echo "✅ Pronto.<br>";

// 2. Extração
if (class_exists('ZipArchive')) {
    echo "Extraindo arquivos... ";
    $zip = new ZipArchive;
    if ($zip->open($zipFile) === TRUE) {
        $zip->extractTo($extractPath);
        $zip->close();
        echo "✅ Pronto.<br>";
    } else {
        echo "❌ Erro ao abrir o ZIP.<br>";
    }
} else {
    echo "❌ Servidor sem ZipArchive. Use o Git para subir a pasta.<br>";
}

// 3. Ativação
echo "Ativando... ";
activate_plugin("woocommerce-extra-checkout-fields-for-brazil/woocommerce-extra-checkout-fields-for-brazil.php");
echo "✅ Plugin Ativo!<br>";

// Limpeza
unlink($zipFile);
unlink(__FILE__);
?>
