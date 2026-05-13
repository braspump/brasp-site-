$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $auth"; "Content-Type" = "application/json" }

function Fix-Encoding($text) {
    if ($null -eq $text) { return $text }
    $text = $text -replace 'Ã¡', 'á'
    $text = $text -replace 'Ã©', 'é'
    $text = $text -replace 'Ã­', 'í'
    $text = $text -replace 'Ã³', 'ó'
    $text = $text -replace 'Ãº', 'ú'
    $text = $text -replace 'Ã£', 'ã'
    $text = $text -replace 'Ãµ', 'õ'
    $text = $text -replace 'Ã¢', 'â'
    $text = $text -replace 'Ãª', 'ê'
    $text = $text -replace 'Ã´', 'ô'
    $text = $text -replace 'Ã§', 'ç'
    $text = $text -replace 'Ã ', 'à'
    return $text
}

write-output "Iniciando limpeza de texto..."
$products = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wc/v3/products?per_page=100" -Headers $headers

foreach ($p in $products) {
    $new_desc = Fix-Encoding $p.description
    $new_name = Fix-Encoding $p.name
    
    if ($new_desc -ne $p.description -or $new_name -ne $p.name) {
        write-output "Corrigindo acentuação: $($p.name)"
        $body = @{
            name = $new_name
            description = $new_desc
        } | ConvertTo-Json -Compress
        
        $update_headers = $headers.Clone()
        $update_headers["Content-Type"] = "application/json; charset=utf-8"
        
        try {
            Invoke-RestMethod -Method Put -Uri "https://equipobras.com.br/wp-json/wc/v3/products/$($p.id)" -Headers $update_headers -Body ([System.Text.Encoding]::UTF8.GetBytes($body))
        } catch {
            write-output "Atenção: Não foi possível atualizar o ID $($p.id)"
        }
    }
}
write-output "Limpeza concluída com sucesso!"
