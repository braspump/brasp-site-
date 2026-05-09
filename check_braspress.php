<?php 
require_once("wp-load.php"); 
$settings = get_option("woocommerce_braspress-api-loja5_settings"); 
echo "CONFIGURACOES BRASPRESS:\n";
print_r($settings);
echo "\nLOGS DE ERRO:\n";
$logs = glob("wp-content/uploads/wc-logs/braspress-*.log");
if($logs) {
    foreach(array_slice($logs, -1) as $log) {
        echo "Ultimo Log ($log):\n";
        echo tailCustom($log, 20);
    }
} else {
    echo "Nenhum log encontrado.";
}
function tailCustom($filepath, $lines = 10) {
    $data = file($filepath);
    $line_count = count($data);
    $res = array_slice($data, $line_count - $lines);
    return implode("", $res);
}
