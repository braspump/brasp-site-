$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $auth" }
$p = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wc/v3/products/42" -Headers $headers
write-output "--- Descrição no Banco de Dados ---"
write-output $p.description
