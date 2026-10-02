$ErrorActionPreference = "Stop"
Set-Location $PSScriptRoot

function Run-Native([string]$Command, [string[]]$Arguments) {
  & $Command @Arguments
  if ($LASTEXITCODE -ne 0) { throw "$Command $($Arguments -join ' ') failed with exit code $LASTEXITCODE" }
}

$dirs = @(
  "bootstrap/cache",
  "storage/framework/cache/data",
  "storage/framework/sessions",
  "storage/framework/views",
  "storage/logs",
  "public/uploads/portfolio",
  "public/uploads/posts",
  "public/uploads/team",
  "public/uploads/branding"
)
foreach ($dir in $dirs) {
  if (-not (Test-Path $dir)) { New-Item -ItemType Directory -Path $dir -Force | Out-Null }
}

if (-not (Test-Path ".env")) {
  Copy-Item ".env.example" ".env"
}

$envPath = Join-Path $PSScriptRoot ".env"
$envText = Get-Content $envPath -Raw
function Set-EnvValue([string]$Name, [string]$Value) {
  $script:envText = $script:envText -replace "(?m)^$([regex]::Escape($Name))=.*$", "$Name=$Value"
  if ($script:envText -notmatch "(?m)^$([regex]::Escape($Name))=") {
    $script:envText += "`r`n$Name=$Value"
  }
}
Set-EnvValue "DB_CONNECTION" "sqlite"
Set-EnvValue "SESSION_DRIVER" "file"
Set-EnvValue "CACHE_STORE" "file"
Set-EnvValue "QUEUE_CONNECTION" "sync"
Set-Content -Path $envPath -Value $envText -NoNewline

if (-not (Test-Path "database/database.sqlite")) { New-Item -ItemType File -Path "database/database.sqlite" -Force | Out-Null }

Run-Native "php" @("artisan", "config:clear")
Run-Native "php" @("artisan", "view:clear")
Run-Native "php" @("artisan", "route:clear")
Run-Native "php" @("artisan", "migrate", "--force")
Run-Native "php" @("artisan", "optimize:clear")

Write-Host ""
Write-Host "NEXARION v4.4 branding update applied without resetting SQLite data." -ForegroundColor Green
Write-Host "Run: php artisan serve"
