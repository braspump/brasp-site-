$creds = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $creds" }
$p = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wc/v3/products/567" -Headers $headers
$p.description | Out-File -FilePath "C:\Users\luis\Desktop\site braspump\output.txt" -Encoding UTF8
write-output "Descrição salva em output.txt"
