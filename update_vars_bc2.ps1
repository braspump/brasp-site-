$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ 
    Authorization = "Basic $auth"
    "Content-Type" = "application/json"
}

# Image ID for BC2 "Sem Capa" is 88
$body = @{
    image = @{ id = 88 }
} | ConvertTo-Json

# Variation 45 (110V Sem Capa)
write-output "Atualizando BC2 Variação 45..."
Invoke-RestMethod -Method Put -Uri "https://equipobras.com.br/wp-json/wc/v3/products/37/variations/45" -Headers $headers -Body $body

# Variation 46 (220V Sem Capa)
write-output "Atualizando BC2 Variação 46..."
Invoke-RestMethod -Method Put -Uri "https://equipobras.com.br/wp-json/wc/v3/products/37/variations/46" -Headers $headers -Body $body

write-output "Variações da BC2 atualizadas com sucesso!"
