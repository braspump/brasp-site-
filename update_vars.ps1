$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ 
    Authorization = "Basic $auth"
    "Content-Type" = "application/json"
}

# Image ID for "Sem Capa" is 89
$body = @{
    image = @{ id = 89 }
} | ConvertTo-Json

# Variation 49 (110V Sem Capa)
write-output "Atualizando Variação 49..."
Invoke-RestMethod -Method Put -Uri "https://equipobras.com.br/wp-json/wc/v3/products/38/variations/49" -Headers $headers -Body $body

# Variation 50 (220V Sem Capa)
write-output "Atualizando Variação 50..."
Invoke-RestMethod -Method Put -Uri "https://equipobras.com.br/wp-json/wc/v3/products/38/variations/50" -Headers $headers -Body $body

write-output "Variações atualizadas com sucesso!"
