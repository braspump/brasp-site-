<?php
require_once('wp-load.php');

$options = array(
    "enabled" => "yes",
    "serial" => "9664-16718-148-22092023-4WAB-LOJA5",
    "login" => "SCALARIESCALARI_PRD",
    "senha" => "YdL5QEG48u34QKeP",
    "cnpj" => "02820874000110",
    "cep" => "13903340",
    "ambiente" => "0", // 0 = Produção
    "frete_tipo" => "1", // 1 = CIF
    "exibir_prazo" => "titulo",
    "debug" => "yes"
);

echo "<h1>Forçando Configurações Braspress</h1>";

if (update_option("woocommerce_braspress-api-loja5_settings", $options)) {
    echo "<p style='color:green'>✅ SUCESSO: Configurações gravadas no banco de dados!</p>";
} else {
    echo "<p style='color:orange'>⚠️ AVISO: As configurações já estavam lá ou não puderam ser alteradas.</p>";
}

// Teste de conexão real após gravar
$settings = get_option('woocommerce_braspress-api-loja5_settings');
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
    'volumes' => 1,
    'Cubagem' => [
        ['largura' => '0.43', 'altura' => '0.46', 'comprimento' => '0.31', 'volumes' => 1]
    ]
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

echo "<h2>Teste de Conexão Pós-Gravação</h2>";
echo "Resposta Braspress: <pre>" . htmlspecialchars($res) . "</pre>";

if ($http == 200) {
    echo "<p style='color:green'>🚀 TUDO PRONTO! A API está funcionando. Pode testar o checkout agora.</p>";
}
?>
