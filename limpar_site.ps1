$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ Authorization = "Basic $auth"; "Content-Type" = "application/json" }

# Mapeamento técnico usando códigos Unicode
$c195 = [char]195
$map = @{
    ($c195 + [char]160) = "à"
    ($c195 + [char]161) = "á"
    ($c195 + [char]162) = "â"
    ($c195 + [char]163) = "ã"
    ($c195 + [char]167) = "ç"
    ($c195 + [char]169) = "é"
    ($c195 + [char]170) = "ê"
    ($c195 + [char]173) = "í"
    ($c195 + [char]179) = "ó"
    ($c195 + [char]180) = "ô"
    ($c195 + [char]181) = "õ"
    ($c195 + [char]186) = "ú"
}

write-output "Iniciando varredura total..."
$products = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/wc/v3/products?per_page=100" -Headers $headers

foreach ($p in $products) {
    $d = $p.description
    $n = $p.name
    $changed = $false

    foreach ($key in $map.Keys) {
        if ($d -contains $key -or $d.Contains($key)) {
            $d = $d.Replace($key, $map[$key])
            $changed = $true
        }
        if ($n -contains $key -or $n.Contains($key)) {
            $n = $n.Replace($key, $map[$key])
            $changed = $true
        }
    }

    if ($changed) {
        write-output "Limpando: $($p.name)"
        $body = @{
            name = $n
            description = $d
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
write-output "Concluído! Verifique o site."
