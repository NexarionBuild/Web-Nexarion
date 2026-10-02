# NEXARION Company Profile CMS — Laravel + SQLite v4.3

Full project Laravel untuk website publik NEXARION dan Admin Control Center. User dan Admin menggunakan sumber data yang sama melalui SQLite.

## Stack
- PHP 8.2+
- Laravel 12
- SQLite
- Blade + JavaScript/CSS inline (tidak perlu npm/Vite untuk menjalankan UI)

## Fitur utama
- Admin login berbasis Laravel session.
- CSRF handling untuk seluruh aksi POST/PUT/DELETE Admin, termasuk upload file.
- CMS dinamis User ↔ Admin ↔ SQLite.
- Services, Portfolio, Process, Pricing, Blog, Team, Careers, Testimonials, FAQ, Technology, Core Values, Why NEXARION.
- Website Content, Page Heroes, Homepage Stats, Legal Pages, dan Contact Options.
- Urutan konten dapat diubah dengan Move Up / Move Down dan urutannya sama di User.
- Show/Hide untuk konten publik yang mendukung visibility.
- Portfolio: project URL, cover URL, upload cover opsional, case-study fields, featured card.
- Blog: cover URL / upload image, Published/Draft.
- Team: foto URL / upload image, social links.
- Career application masuk ke Inbox Admin.
- Contact inquiry masuk ke Inbox Admin.
- Inbox: read/unread, star, delete.
- Client Notices melalui Laravel Mail. Default `MAIL_MAILER=log`.
- Maintenance Mode terhubung ke website publik.
- Activity Log.
- Settings identitas website + perubahan akun Admin.
- Public frontend memiliki fallback agar tidak blank total bila API/data bermasalah.

## Instalasi baru di Laragon

### 1. Extract
Extract folder project ke misalnya:

```text
C:\laragon\www\Company-Profile
```

### 2. Pastikan SQLite aktif
Pada `php.ini` Laragon pastikan extension berikut aktif:

```ini
extension=pdo_sqlite
extension=sqlite3
```

Restart Laragon setelah mengubah `php.ini`.

### 3. Jalankan setup otomatis
Buka Terminal Laragon:

```powershell
cd C:\laragon\www\Company-Profile
powershell -ExecutionPolicy Bypass -File .\setup.ps1
```

Script akan:
- membuat folder cache/storage/upload yang dibutuhkan;
- membuat `.env` dari `.env.example` bila belum ada;
- membuat `database/database.sqlite` bila belum ada;
- menjalankan `composer install`;
- membuat `APP_KEY`;
- menjalankan migration dan seeder;
- membersihkan cache Laravel.

### 4. Jalankan project

```powershell
php artisan serve
```

Buka:

```text
User  : http://127.0.0.1:8000/
Admin : http://127.0.0.1:8000/admin
```

Login awal:

```text
Username : nexarion.owner
Password : nexarion2026
```

Segera ubah password melalui **Admin > Settings > Account**.

## Instalasi manual
Jika tidak ingin memakai `setup.ps1`:

```powershell
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan optimize:clear
php artisan serve
```

Pastikan file berikut tersedia sebelum migration:

```text
database/database.sqlite
```

Jika belum ada:

```powershell
New-Item database\database.sqlite -ItemType File
```

## Update project existing tanpa menghapus SQLite
Jika project lama sudah memiliki data, backup dulu:

```powershell
copy database\database.sqlite database\database-backup.sqlite
```

Setelah menimpa file kode dengan versi ini, jalankan:

```powershell
powershell -ExecutionPolicy Bypass -File .\update-existing.ps1
```

`update-existing.ps1` menggunakan `php artisan migrate`, bukan `migrate:fresh`, sehingga database existing tidak direset.

## Upload file
File upload disimpan ke:

```text
public/uploads/portfolio
public/uploads/posts
public/uploads/team
```

Format gambar: JPEG/JPG, PNG, WebP, GIF. Maksimum 5 MB per file.

## Email Client Notices
Secara default:

```env
MAIL_MAILER=log
```

Email akan ditulis ke:

```text
storage/logs/laravel.log
```

Untuk pengiriman email nyata, isi konfigurasi SMTP di `.env`.

## File penting
- `resources/views/site.blade.php` — frontend User.
- `resources/views/admin.blade.php` — Admin Control Center.
- `app/Services/NexarionState.php` — mapping/sinkronisasi CMS dengan SQLite.
- `app/Http/Controllers/AdminController.php` — auth, CMS state, upload, notices, account.
- `app/Http/Controllers/InquiryController.php` — contact dan career application.
- `routes/web.php` — seluruh route publik/admin.
- `database/migrations/` — struktur SQLite.
- `database/seeders/DatabaseSeeder.php` — akun awal dan konten seed.
- `database/seeders/data/content.json` — konten awal modul utama.

## Catatan penting
- Jangan menjalankan `php artisan migrate:fresh --seed` pada database produksi/existing jika ingin mempertahankan data.
- Untuk project baru, `setup.ps1` memang memakai `migrate:fresh --seed` agar database mulai dari kondisi bersih.
- Jika browser masih memakai JavaScript versi lama setelah update, tutup tab User/Admin lalu buka kembali.

## v4.3 public rendering fix

- Restores the missing global HTML escaping helper used by dynamic public components.
- Prevents non-critical UI/animation initialization errors from replacing the entire public page.
- Each public enhancement is initialized independently so content remains visible if an effect fails.


## v4.4 — Dynamic logo branding
- Admin → Website Content now supports Logo URL and Upload Logo.
- Uploaded logo is stored under `public/uploads/branding`.
- The same logo is used on the public header/footer and Admin login/sidebar/maintenance preview.
- PNG/WebP with transparent background is recommended; JPEG/PNG/WebP/GIF up to 5 MB is accepted.
- No database migration is needed because the logo path is stored in the existing Website Content JSON record.
