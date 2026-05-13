$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $auth" }
$pages = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wp/v2/pages" -Headers $headers
$pages | Select-Object id, slug, status | ConvertTo-Json -Depth 5 | Out-File "C:\Users\luis\Desktop\site braspump\pages.json" -Encoding UTF8
