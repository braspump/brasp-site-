$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $auth"; "Content-Type" = "application/json" }

function Fix-DoubleEncoding($text) {
    if ($null -eq $text -or $text -eq "") { return $text }
    
    try {
        # Converte a string "quebrada" para bytes ISO-8859-1
        $iso = [System.Text.Encoding]::GetEncoding("ISO-8859-1")
        $utf8 = [System.Text.Encoding]::UTF8
        
        $bytes = $iso.GetBytes($text)
        $fixed = $utf8.GetString($bytes)
        
        # Se a string resultante for diferente, retornamos ela
        return $fixed
    } catch {
        return $text
    }
}

write-output "Iniciando desembrulho de codificação (Reverse Engineering)..."
$products = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wc/v3/products?per_page=100" -Headers $headers

foreach ($p in $products) {
    $new_desc = Fix-DoubleEncoding $p.description
    $new_name = Fix-DoubleEncoding $p.name
    
    if ($new_desc -ne $p.description -or $new_name -ne $p.name) {
        write-output "Texto restaurado para: $($p.name)"
        $body = @{
            name = $new_name
            description = $new_desc
        } | ConvertTo-Json -Compress
        
        $update_headers = $headers.Clone()
        $update_headers["Content-Type"] = "application/json; charset=utf-8"
        
        try {
            $bytes = [System.Text.Encoding]::UTF8.GetBytes($body)
            Invoke-RestMethod -Method Put -Uri "https://equipobras.com.br/wp-json/wc/v3/products/$($p.id)" -Headers $update_headers -Body $bytes
            write-output "Sucesso!"
        } catch {
            write-output "Erro ao salvar $($p.name)"
        }
    }
}
write-output "Processo de restauração concluído!"
