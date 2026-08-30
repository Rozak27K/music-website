# Eskul Musik SMKN 1 Dukuhturi

Website ekstrakurikuler musik berbasis Laravel, Tailwind CSS, dan JavaScript.

## Kebutuhan

- PHP 8.2 atau lebih baru
- Composer
- Node.js dan npm
- SQLite atau database lain yang didukung Laravel

## Setup Lokal

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Jika memakai SQLite, buat file database:

```bash
# Windows
type nul > database/database.sqlite

# macOS / Linux
touch database/database.sqlite
```

Lalu jalankan migration, seed data galeri awal, dan storage link:

```bash
php artisan migrate --seed
php artisan storage:link
npm run build
php artisan serve
```

Website akan berjalan di URL yang ditampilkan oleh `php artisan serve`.

## Akun Admin

Seeder hanya membuat akun admin jika variabel berikut diisi di `.env`:

```env
ADMIN_NAME="Admin Eskul Musik"
ADMIN_EMAIL="admin@example.com"
ADMIN_PASSWORD="isi-password-kuat"
```

Setelah itu jalankan:

```bash
php artisan db:seed
```

## Catatan

- Data galeri awal disimpan lewat `DefaultGaleriSeeder`, sehingga bisa diedit dan dihapus dari halaman admin.
- File upload admin disimpan ke disk `public`, jadi `php artisan storage:link` wajib dijalankan di device baru.
- Asset frontend dibuat dengan Vite lewat `npm run build`.
