$creds = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"))
$headers = @{
    Authorization = "Basic $creds"
    "Content-Type" = "application/json"
}

# 1. Create Categories
$categories = @(
    @{ name = "Linha CARBON"; slug = "linha-carbon" },
    @{ name = "Linha TURBO"; slug = "linha-turbo" },
    @{ name = "Unidades Suctoras"; slug = "unidades-suctoras" }
)

$cat_ids = @{}

foreach ($cat in $categories) {
    write-output "Creating category: $($cat.name)..."
    $res = Invoke-RestMethod -Method Post -Uri "https://equipobras.com.br/wp-json/wc/v3/products/categories" -Headers $headers -Body ($cat | ConvertTo-Json)
    $cat_ids[$cat.name] = $res.id
    write-output "Created ID: $($res.id)"
}

# 2. Assign Products
$assignments = @(
    @{ id = 38; cat = "Linha CARBON" },
    @{ id = 37; cat = "Linha CARBON" },
    @{ id = 42; cat = "Linha TURBO" },
    @{ id = 41; cat = "Linha TURBO" },
    @{ id = 40; cat = "Linha TURBO" },
    @{ id = 39; cat = "Linha TURBO" },
    @{ id = 36; cat = "Unidades Suctoras" }
)

foreach ($asn in $assignments) {
    $cat_id = $cat_ids[$asn.cat]
    write-output "Assigning product $($asn.id) to category $($asn.cat) (ID: $cat_id)..."
    $body = @{
        categories = @( @{ id = $cat_id } )
    } | ConvertTo-Json
    $res = Invoke-RestMethod -Method Put -Uri "https://equipobras.com.br/wp-json/wc/v3/products/$($asn.id)" -Headers $headers -Body $body
    write-output "Done."
}

# 3. Handle Test Product (Move to Uncategorized or just leave)
write-output "Categorization complete."
