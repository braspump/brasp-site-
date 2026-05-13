$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $auth" }
$variations = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wc/v3/products/36/variations" -Headers $headers
$variations | ConvertTo-Json -Depth 5 | Out-File "C:\Users\luis\Desktop\site braspump\prod_36_vars.json" -Encoding UTF8
