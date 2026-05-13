$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $auth"; "Content-Type" = "application/json" }

function Fix-Encoding($text) {
    if ($null -eq $text) { return $text }
    
    # Mapeamento usando códigos de caracteres para evitar problemas de interpretação
    $map = @{
        "$([char]0x00C3)$([char]0x00A1)" = "á"
        "$([char]0x00C3)$([char]0x00A9)" = "é"
        "$([char]0x00C3)$([char]0x00AD)" = "í"
        "$([char]0x00C3)$([char]0x00B3)" = "ó"
        "$([char]0x00C3)$([char]0x00BA)" = "ú"
        "$([char]0x00C3)$([char]0x00A3)" = "ã"
        "$([char]0x00C3)$([char]0x00B5)" = "õ"
        "$([char]0x00C3)$([char]0x00A2)" = "â"
        "$([char]0x00C3)$([char]0x00AA)" = "ê"
        "$([char]0x00C3)$([char]0x00B4)" = "ô"
        "$([char]0x00C3)$([char]0x00A7)" = "ç"
        "$([char]0x00C3)$([char]0x00A0)" = "à"
    }

    foreach ($old in $map.Keys) {
        $text = $text.Replace($old, $map[$old])
    }
    return $text
}

write-output "Iniciando varredura técnica de acentuação..."
$products = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wc/v3/products?per_page=100" -Headers $headers

foreach ($p in $products) {
    $new_desc = Fix-Encoding $p.description
    $new_name = Fix-Encoding $p.name
    
    if ($new_desc -ne $p.description -or $new_name -ne $p.name) {
        write-output "Limpando caracteres em: $($p.name)"
        $body = @{
            name = $new_name
            description = $new_desc
        } | ConvertTo-Json -Compress
        
        $update_headers = $headers.Clone()
        $update_headers["Content-Type"] = "application/json; charset=utf-8"
        
        try {
            $update_body = [System.Text.Encoding]::UTF8.GetBytes($body)
            Invoke-RestMethod -Method Put -Uri "https://equipobras.com.br/wp-json/wc/v3/products/$($p.id)" -Headers $update_headers -Body $update_body
            write-output "Ok!"
        } catch {
            write-output "Erro no ID $($p.id)"
        }
    }
}
write-output "Processo finalizado!"
