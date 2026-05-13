$auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{ 
    Authorization = "Basic $auth"
    "Content-Type" = "application/json; charset=utf-8"
}

$desc = @"
<ul class='space-y-2 mb-10 list-disc list-inside text-sm font-medium'>
<li>Para ser instalada à longa distância (externa).</li>
<li><strong>Super Silenciosa</strong>, devido à tecnologia do <strong>Novo Abafador de Ruídos Exclusivo Braspump</strong>.</li>
<li>Construída em <strong>Bronze</strong> (flange, rotor e tampa).</li>
<li><strong>Filtro coletor de detritos</strong>, com sistema de lavagem automática e descarga dos resíduos diretamente para o esgoto.</li>
<li>Potência do motor <strong>1,0 HP</strong>.</li>
<li>Vácuo máximo <strong>550 mm/Hg</strong>.</li>
</ul>
"@

# Montando o JSON manualmente para evitar que o PowerShell mexa nos acentos
$json = "{`"description`":`"$($desc.Replace("`"", "\`"").Replace("`n", "\n").Replace("`r", ""))`"}"

write-output "Enviando JSON blindado..."

try {
    $bytes = [System.Text.Encoding]::UTF8.GetBytes($json)
    Invoke-RestMethod -Method Put -Uri "https://equipobras.com.br/wp-json/wc/v3/products/42" -Headers $headers -Body $bytes
    write-output "Sucesso total! Produto 42 atualizado."
} catch {
    write-output "Erro: $($_.Exception.Message)"
}
