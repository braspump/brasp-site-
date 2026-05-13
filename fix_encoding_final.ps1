$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $auth"; "Content-Type" = "application/json" }

function Fix-Encoding($text) {
    if ($null -eq $text) { return $text }
    
    # Mapeamento expandido baseado na análise do JSON real
    $map = @{
        "Ã¡" = "á"
        "Ã©" = "é"
        "Ã­" = "í"
        "Ã³" = "ó"
        "Ãº" = "ú"
        "Ã£" = "ã"
        "Ãµ" = "õ"
        "Ã¢" = "â"
        "Ãª" = "ê"
        "Ã´" = "ô"
        "Ã§" = "ç"
        "Ã " = "à"
        "Ã " = "à"
        "Â°" = "°"
    }

    foreach ($old in $map.Keys) {
        $text = $text.Replace($old, $map[$old])
    }
    return $text
}

write-output "Iniciando limpeza profunda de acentuação..."
$products = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wc/v3/products?per_page=100" -Headers $headers

foreach ($p in $products) {
    $new_desc = Fix-Encoding $p.description
    $new_name = Fix-Encoding $p.name
    
    if ($new_desc -ne $p.description -or $new_name -ne $p.name) {
        write-output "Corrigindo: $($p.name)"
        $body = @{
            name = $new_name
            description = $new_desc
        } | ConvertTo-Json -Compress
        
        $update_headers = $headers.Clone()
        $update_headers["Content-Type"] = "application/json; charset=utf-8"
        
        try {
            # Forçando UTF8 no corpo da requisição
            $update_body = [System.Text.Encoding]::UTF8.GetBytes($body)
            Invoke-RestMethod -Method Put -Uri "https://equipobras.com.br/wp-json/wc/v3/products/$($p.id)" -Headers $update_headers -Body $update_body
            write-output "Sucesso!"
        } catch {
            write-output "Erro ao atualizar ID $($p.id)"
        }
    }
}
write-output "Site limpo e corrigido!"
