# ngodinglagi — jasa website

Website company profile **ngodinglagi**: jasa web development, SA-MP/Open.MP development, dan VPS/server administration.

**Stack:** Laravel 13 · PHP 8.3 · Blade · Tailwind CSS v4 · Vite · SQLite

## Fitur

- Halaman publik: `/`, `/layanan`, `/about`, `/kontak`
- Panel admin `/admin` (login password, rate limit 5×/menit/IP)
- Edit konten via admin → menulis `config/*.php` (ConfigWriter)
- SEO: OG/Twitter card, JSON-LD `ProfessionalService`, `/sitemap.xml`, `/robots.txt`
- Dark mode (toggle di header)
- CTA WhatsApp pre-fill kontekstual

## Setup lokal

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm install
npm run build
php artisan serve
```

Atau satu perintah: `composer run setup` (butuh Node/npm).

Buka `http://127.0.0.1:8000` — admin di `http://127.0.0.1:8000/admin`.

## Konfigurasi penting (`.env`)

| Variabel | Keterangan |
|----------|------------|
| `APP_URL` | URL publik production, contoh `https://domainmu.com` |
| `APP_DEBUG` | `false` di production |
| `ADMIN_PASSWORD` | Password login `/admin` — **wajib ganti** |
| `DB_CONNECTION` | Default `sqlite` |
| `SESSION_DRIVER` | Default `database` (butuh migrate) |

## Deploy (shared hosting / cPanel via SFTP)

1. **Build lokal dulu** (wajib sebelum upload):
   ```bash
   npm run build
   composer install --no-dev --optimize-autoloader
   ```
2. Buka `.vscode/sftp.json` — isi `host`, `username`, `remotePath` (folder web root, mis. `/public_html`).
3. Upload project ke server (ekstensi SFTP VS Code). File yang di-ignore sudah dikonfigurasi (`.env`, `vendor/`, `node_modules/`, `storage/` runtime, dsb — kecuali kalau memang mau upload vendor).
4. Di server (File Manager / terminal hosting):
   - Upload/paste `.env` production: salin `.env.example`, isi `APP_URL`, `APP_DEBUG=false`, `ADMIN_PASSWORD` kuat, generate `APP_KEY` via `php artisan key:generate` jika terminal tersedia.
   - Pastikan `database/database.sqlite` ada & writable, atau pakai MySQL dengan isi kredensial di `.env`.
   - `php artisan migrate --force` (butuh terminal SSH).
   - Folder writable: `storage/` dan `bootstrap/cache/`.
   - Document root hosting → folder `public/` (biasanya otomatis untuk Laravel).
5. Jika hosting **tanpa** SSH/terminal: upload juga `vendor/` hasil `composer install --no-dev`, jalankan migrate dari lokal ke DB remote, atau gunakan session driver `file` bila tabel sessions tidak tersedia.

### Catatan ConfigWriter

Admin menulis ulang `config/*.php`. Jika kamu memakai `php artisan config:cache`, ConfigWriter otomatis menghapus cache config saat simpan — aman.

## Panel admin

- URL: `/admin` (tidak ada di nav publik)
- Password: env `ADMIN_PASSWORD`
- Rate limit login: 5 percobaan / menit / IP

## Development

```bash
npm run dev      # Vite dev server
composer run dev # artisan dev (PHP + Vite)
composer run test
```

## Struktur singkat

```
routes/web.php          → halaman publik + admin + sitemap/robots
resources/views/        → Blade (home, layanan, about, kontak, admin/*)
config/*.php            → kontak, layanan, portofolio/tentang, products, admin
app/Support/            → ConfigWriter, WaLink
design-system/          → aturan visual (MASTER.md)
```

Status project: lihat `PROJECT-STATUS.md`.
