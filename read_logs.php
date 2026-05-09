<?php 
require_once("wp-load.php"); 
$log_dir = WP_CONTENT_DIR . "/uploads/wc-logs/";
$files = glob($log_dir . "braspress-api-loja5*.log");
if ($files) {
    usort($files, function($a, $b) { return filemtime($b) - filemtime($a); });
    $latest = $files[0];
    echo "LENDO LOG: " . basename($latest) . "\n\n";
    $lines = file($latest);
    echo implode("", array_slice($lines, -30));
} else {
    echo "Nenhum arquivo de log encontrado em $log_dir";
}
unlink(__FILE__);
