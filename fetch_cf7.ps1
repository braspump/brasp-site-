$user = "luis@braspump.com.br"
$pass = "aaOc 5QPj ocIG ni5X XrF0 dqiw"
$pair = "${user}:${pass}"
$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes($pair))
$headers = @{ Authorization = "Basic $auth" }

try {
    $response = Invoke-RestMethod -Uri "https://equipobras.com.br/wp-json/contact-form-7/v1/contact-forms" -Headers $headers
    Write-Output "Total de formularios: $($response.count)"
    $response.items | ForEach-Object {
        Write-Output "---"
        Write-Output "ID:   $($_.id)"
        Write-Output "Nome: $($_.title)"
    }
    $response | ConvertTo-Json -Depth 10 | Out-File "cf7_forms.json" -Encoding UTF8
} catch {
    Write-Output "Erro: $($_.Exception.Message)"
}
