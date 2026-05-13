$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $auth" }
$media = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wp/v2/media?per_page=100" -Headers $headers
$media | Select-Object id, @{Name="Title";Expression={$_.title.rendered}}, source_url | ConvertTo-Json -Depth 5 | Out-File "C:\Users\luis\Desktop\site braspump\all_media.json" -Encoding UTF8
