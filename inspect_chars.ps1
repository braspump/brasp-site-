$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $auth" }
$products = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wc/v3/products?per_page=20" -Headers $headers

foreach ($p in $products) {
    write-output "--- Produto: $($p.name) ---"
    $chars = $p.description.ToCharArray()
    foreach ($c in $chars) {
        $code = [int]$c
        if ($code -gt 127) {
            write-output "Caractere: $c (Código: $code)"
        }
    }
}
