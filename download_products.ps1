$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $auth" }
$url = "https://equipobras.com.br/wp-json/wc/v3/products?per_page=100"
write-output "Iniciando download de produtos..."
$products = Invoke-RestMethod -Uri $url -Headers $headers
$products | ConvertTo-Json -Depth 10 | Out-File -FilePath "C:\Users\luis\Desktop\site braspump\all_products.json" -Encoding UTF8
write-output "Download concluído: all_products.json"
