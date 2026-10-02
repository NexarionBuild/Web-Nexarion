$ErrorActionPreference = "Stop"
Set-Location $PSScriptRoot

function Run-Native([string]$Command, [string[]]$Arguments) {
  & $Command @Arguments
  if ($LASTEXITCODE -ne 0) {
    throw "$Command $($Arguments -join ' ') failed with exit code $LASTEXITCODE"
  }
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

if (-not (Test-Path ".env")) { Copy-Item ".env.example" ".env" }
if (-not (Test-Path "database/database.sqlite")) { New-Item -ItemType File -Path "database/database.sqlite" -Force | Out-Null }

Run-Native "composer" @("install")
Run-Native "php" @("artisan", "key:generate", "--force")
Run-Native "php" @("artisan", "config:clear")
Run-Native "php" @("artisan", "view:clear")
Run-Native "php" @("artisan", "route:clear")
Run-Native "php" @("artisan", "migrate:fresh", "--seed", "--force")
Run-Native "php" @("artisan", "optimize:clear")

Write-Host ""
Write-Host "NEXARION v4.4 ready." -ForegroundColor Green
Write-Host "Run:    php artisan serve"
Write-Host "Public: http://127.0.0.1:8000/"
Write-Host "Admin:  http://127.0.0.1:8000/admin"
Write-Host "Login:  nexarion.owner / nexarion2026"
