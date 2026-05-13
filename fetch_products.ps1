$creds = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{Authorization = "Basic $creds"}
$res = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wc/v3/products" -Headers $headers
$res | Select-Object id, name | Format-Table -AutoSize
