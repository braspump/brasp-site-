$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $auth" }
$products = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wc/v3/products?search=Suctora" -Headers $headers
$products | Select-Object id, name | ConvertTo-Json -Depth 5 | Out-File "C:\Users\luis\Desktop\site braspump\prod_suctora_id.json" -Encoding UTF8
