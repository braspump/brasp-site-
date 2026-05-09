<?php
require_once('wp-load.php');
$settings = get_option('woocommerce_braspress-api-loja5_settings');

echo "<h1>Teste de Diagnóstico Braspress</h1>";

if (!$settings) {
    echo "<p style='color:red'>❌ Erro: Configurações não encontradas no banco de dados!</p>";
    exit;
}

echo "<ul>";
echo "<li>Serial configurado: " . (empty($settings['serial']) ? '❌ Não' : '✅ Sim') . "</li>";
echo "<li>Login configurado: " . (empty($settings['login']) ? '❌ Não' : '✅ Sim') . "</li>";
echo "<li>Senha configurada: " . (empty($settings['senha']) ? '❌ Não' : '✅ Sim') . "</li>";
echo "<li>CEP de Origem: " . $settings['cep'] . "</li>";
echo "</ul>";

// Teste de conexão real
$auth = base64_encode($settings['login'] . ':' . $settings['senha']);
$body = json_encode([
    'cnpjRemetente' => preg_replace('/\D/', '', $settings['cnpj']),
    'cnpjDestinatario' => '11111111111111',
    'modal' => 'R',
    'tipoFrete' => (int)$settings['frete_tipo'],
    'cepOrigem' => preg_replace('/\D/', '', $settings['cep']),
    'cepDestino' => '13903270',
    'vlrMercadoria' => 100.00,
    'peso' => 1.00,
    'volumes' => 1
]);

$ch = curl_init('https://api.braspress.com/v1/cotacao/calcular/json');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Basic ' . $auth
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
$res = curl_exec($ch);
$http = curl_getinfo($ch, CURLINFO_HTTP_CODE);

echo "<h2>Resultado da Conexão com Braspress</h2>";
echo "Status HTTP: " . $http . "<br>";
echo "Resposta: <pre>" . htmlspecialchars($res) . "</pre>";

if ($http == 200) {
    echo "<p style='color:green'>✅ A API está respondendo corretamente do seu servidor!</p>";
} else {
    echo "<p style='color:red'>❌ Erro na comunicação. Verifique os dados acima.</p>";
}
?>
