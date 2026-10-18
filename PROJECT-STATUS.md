# PROJECT-STATUS.md — ngodinglagi

> Diperbarui: 2026-10-18. Hanya berisi status yang bisa diverifikasi. Hal yang belum diuji ditandai eksplisit.

## Project & stack

| Item | Nilai |
|------|--------|
| Nama folder | `jasa-website` (brand UI: **ngodinglagi**) |
| Backend | Laravel **13.37**, PHP **8.3** |
| Frontend | Blade + Tailwind CSS **v4** + Vite **8** (tanpa SPA/Inertia) |
| Font | Space Grotesk (heading) + DM Sans (body) via `laravel-vite-plugin/fonts` (bunny) |
| DB | SQLite — hanya tabel default Laravel (tanpa tabel bisnis) |
| Rules `.ai/rules` | **Tidak ada** |
| Git | Folder project **untracked** di repo induk `D:\Ngoding wae` |

### Struktur penting

```
routes/web.php                     → GET / (home), /portofolio, /layanan, /kontak, /admin/*
resources/views/home.blade.php     → homepage Bento Grid
resources/views/portofolio.blade.php → halaman portofolio
resources/views/layanan.blade.php  → halaman layanan + harga
resources/views/kontak.blade.php   → halaman kontak
resources/views/admin/*.blade.php  → panel admin (login, dashboard, edit)
resources/views/components/layout.blade.php → layout utama
resources/views/components/contact-chip.blade.php → kartu kontak
resources/css/app.css              → token design system + utility
resources/js/app.js                → reveal, header scroll, count-up, copy
config/contact.php                 → WA/IG/Discord (edit via admin)
config/portfolio.php               → stats + kategori (edit via admin)
config/services.php                → layanan + harga (edit via admin)
config/products.php                → affiliate Wide Host Media (edit via admin)
config/admin.php                   → password admin (env ADMIN_PASSWORD)
app/Http/Middleware/AdminAuth.php  → proteksi /admin
app/Http/Controllers/Admin/*       → controller panel
app/Support/ConfigWriter.php       → tulis config dari admin
design-system/ngodinglagi/MASTER.md → source of truth desain
vite.config.js                     → font + input CSS/JS
```

`welcome.blade.php` masih ada (default Laravel) tetapi **tidak dipakai**.

## Kanal kontak (aktif)

| Kanal | Nilai | Status |
|-------|--------|--------|
| WhatsApp | `0812-2101-5825` → `https://wa.me/6281221015825` | ✅ di CTA + footer |
| Instagram | `@marcelanwl` → `https://www.instagram.com/marcelanwl` | ✅ di CTA + footer |
| Discord | `lumikylinnn_28271` | ✅ tombol salin (tanpa URL) |

Sumber data: `config/contact.php` (edit via `/admin/kontak`).

## Design system

- File: `design-system/ngodinglagi/MASTER.md`
- Karakter: Bento Grid, bg off-white `#F8FAFC`, aksen teal `#0F766E` / `#0D9488`
- Badge hero: teks **"NgodingLagi?"**
- Belum ada `design-system/ngodinglagi/pages/*.md`

## Fitur selesai

### `/` (homepage)
- Header sticky glassmorphism + nav (Beranda, Layanan, Portofolio, Kontak)
- Bento grid: hero full-bleed + cluster stat, tentang+layanan split, strip promosi WHM, CTA kontak split
- Statistik 23/8 (count-up)
- Animasi: rise-in, scroll reveal, header shadow saat scroll, hover lift, arrow nudge, count-up
- `prefers-reduced-motion` + fallback `<noscript>`

### `/portofolio`
- Stats 23 SA-MP / 8 website (count-up)
- 3 kategori (SA-MP, Website, VPS) dengan daftar kemampuan — **tanpa nama proyek karangan**
- CTA kontak

### `/layanan`
- Header hero + strip alur kerja 3 langkah (Diskusi → Dikerjakan → Diserahkan)
- 3 kartu detail layanan dengan icon chip, deskripsi, cakupan kerja, cocok untuk
- **Harga placeholder** per tier ("Mulai dari") — edit via admin
- CTA

### `/kontak`
- Kartu WhatsApp utama, Instagram, Discord (salin), tips, link portofolio

### `/admin` (panel — **tanpa nav publik**)
- Akses: ketik `/admin` di URL (tidak muncul di menu website)
- Login password dari `ADMIN_PASSWORD` di `.env` (default `ngodinglagi123` — **ganti di production**)
- Middleware `admin` + layout **sidebar gelap** + view login standalone (hero gradien teal)
- Dashboard: KPI count-up (proyek, layanan, tier harga, kategori), **donut chart** komposisi SA-MP vs website (SVG), **bar chart** harga tier (tanpa library), pintasan edit
- Halaman: Kontak, Layanan+harga, Portofolio, Mitra affiliate
- Animasi: `fade-up` / `rise-in`, hover lift KPI, bar-grow, donut draw, hormati `prefers-reduced-motion`
- Semua simpan menulis ulang `config/*.php` via `ConfigWriter`

## Pemeriksaan terakhir

| Cek | Hasil | Kapan |
|-----|--------|--------|
| `php artisan test --compact` | ✅ **10/10 passed** (40 assertions) | 2026-10-18 |
| `vendor/bin/pint` | ✅ passed | 2026-10-18 |
| `npm run build` | ✅ sukses | 2026-10-18 |
| Browser headless `/` `/layanan` | ✅ tanpa overflow 375/1440 | 2026-10-18 |
| Server `localhost:8000` | ✅ running | 2026-10-18 |

## Belum selesai / belum diverifikasi

- [ ] Nama proyek nyata untuk daftar portofolio
- [ ] Dark mode — token di MASTER mendukung, implementasi belum ada
- [ ] Visual check di browser non-Edge / perangkat fisik — belum
- [ ] Deployment — belum
- [ ] Admin: tambah/hapus layanan, tier harga, kategori — form edit only
- [ ] Admin: ubah password via UI (baru via `.env`)
- [ ] Admin: proteksi rate limit brute force — belum
- [ ] Ganti `ADMIN_PASSWORD` default sebelum production

## Catatan lintas-session

- Ikuti `AGENTS.md` (Laravel Boost): Pint setelah edit PHP, `search-docs` sebelum API Laravel, jangan tambah dependency tanpa approval
- **Jangan buka folder di luar `jasa-website`** (permintaan user)
- Skill relevan: `ui-ux-pro-max`, `tailwindcss-development`, `laravel-best-practices`
- Selalu baca `design-system/ngodinglagi/MASTER.md` sebelum ubah UI
- Kontak: edit via `/admin/kontak` atau `config/contact.php`
- Harga layanan: edit via `/admin/layanan` atau `config/services.php`
- Affiliate: edit via `/admin/mitra` atau `config/products.php`
- Password admin: env `ADMIN_PASSWORD` → `config/admin.php`
