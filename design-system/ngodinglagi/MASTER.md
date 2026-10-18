# Design System Master File — ngodinglagi

> **LOGIC:** When building a specific page, first check `design-system/ngodinglagi/pages/[page-name].md`.
> If that file exists, its rules **override** this Master file.
> If not, strictly follow the rules below.

---

**Project:** ngodinglagi  
**Updated:** 2026-10-16  
**Stack:** Laravel 13 + Blade + Tailwind CSS v4 + Vite  
**Design Dials:** Variance 3/10 (Centered / Minimal) | Motion 2/10 (Subtle) | Density 4/10 (Standard)

**Skill sources (verified):**
- Style: `bento-box-grid` + `minimalism-and-swiss-style` (`--domain style`)
- Landing pattern: `bento-grid-showcase` (`--domain landing`)
- Typography: “Tech Startup” pairing (`--domain typography`)
- Color base: teal trust palette adapted to muted mint (`--domain color`)
- Motion: Subtle Scroll Reveal + reduced-motion rules (`--domain gsap`, `--domain ux`)

---

## Global Rules

### Brand & Audience

- Bahasa UI: **Indonesia**
- Audiens: individu, komunitas game, bisnis yang butuh jasa teknologi
- Nuansa: **soft, clean, minimal, modern, profesional** — bukan dashboard SaaS, bukan terminal/hacker, tanpa neon/glitch
- Data nyata saja: **23 proyek SA-MP**, **8 proyek website**
- Dilarang mengarang testimoni, klien, sertifikasi, atau statistik lain

### Color Palette (semantic tokens)

| Role | Hex | CSS Variable |
|------|-----|--------------|
| Primary | `#0F766E` | `--color-primary` |
| On Primary | `#FFFFFF` | `--color-on-primary` |
| Secondary | `#14B8A6` | `--color-secondary` |
| On Secondary | `#0F172A` | `--color-on-secondary` |
| Accent/CTA | `#0D9488` | `--color-accent` |
| On Accent/CTA | `#FFFFFF` | `--color-on-accent` |
| Background | `#F8FAFC` | `--color-background` |
| Foreground | `#0F172A` | `--color-foreground` |
| Card | `#FFFFFF` | `--color-card` |
| Card Foreground | `#0F172A` | `--color-card-foreground` |
| Muted | `#F1F5F9` | `--color-muted` |
| Muted Foreground | `#475569` | `--color-muted-foreground` |
| Border | `#E2E8F0` | `--color-border` |
| Destructive | `#DC2626` | `--color-destructive` |
| On Destructive | `#FFFFFF` | `--color-on-destructive` |
| Ring | `#0F766E` | `--color-ring` |

**Color Notes:**
- Background off-white / light gray (`#F8FAFC`), bukan putih murni penuh
- Aksen **muted mint/teal** — hindari teal terlalu neon/hijau terang
- Card putih dengan border halus `#E2E8F0`
- Kontras teks body minimal **4.5:1**; primary `#0F766E` di atas putih aman untuk large/UI text, untuk body panjang pakai Foreground `#0F172A`

**Tailwind v4 (app.css nanti):**
```css
@theme {
  --color-primary: #0F766E;
  --color-accent: #0D9488;
  --color-background: #F8FAFC;
  --color-card: #FFFFFF;
  --color-border: #E2E8F0;
}
```

### Typography

- **Heading Font:** Space Grotesk (400–700) — modern, bersih, sedikit karakter tech tanpa agresif
- **Body Font:** DM Sans (400–500–700) — readable, netral profesional
- Base body: **16px**, line-height **1.5**
- Heading: hierarchy jelas (H1 ~clamp 2rem–3rem, H2 ~1.5–2rem), tracking sedikit rapat untuk display
- Label uppercase kecil hanya untuk eyebrow/meta, letter-spacing wajar
- **Google Fonts:**
```text
https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Space+Grotesk:wght@400;500;600;700&display=swap
```

```css
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Space+Grotesk:wght@400;500;600;700&display=swap');
```

**Tailwind:**
```css
@theme {
  --font-heading: 'Space Grotesk', ui-sans-serif, system-ui, sans-serif;
  --font-body: 'DM Sans', ui-sans-serif, system-ui, sans-serif;
}
```

### Spacing Variables

*Density: 4/10 — Standard (cukup whitespace di antara kartu bento)*

| Token | Value | Usage |
|-------|-------|-------|
| `--space-xs` | `4px` | Gap ikon–teks |
| `--space-sm` | `8px` | Chip, inline |
| `--space-md` | `16px` | Padding card kecil, grid gap mobile |
| `--space-lg` | `24px` | Padding card default |
| `--space-xl` | `32px` | Gap antar kartu desktop, section padding |
| `--space-2xl` | `48px` | Section spacing |
| `--space-3xl` | `64px` | Hero / major section |

### Radius & Shadow

| Token | Value | Usage |
|-------|-------|-------|
| `--radius-sm` | `8px` | Button, input, chip |
| `--radius-md` | `12px` | Card kecil |
| `--radius-lg` | `16px` | Card bento utama (radius sedang) |
| `--shadow-card` | `0 1px 2px rgba(15,23,42,0.04), 0 4px 12px rgba(15,23,42,0.04)` | Default kartu — sangat ringan |
| `--shadow-card-hover` | `0 2px 4px rgba(15,23,42,0.05), 0 8px 20px rgba(15,23,42,0.06)` | Hover — sedikit naik saja |

Hindari shadow tebal/blur besar. Border 1px `--color-border` wajib ada di setiap kartu.

---

## Layout: Bento Grid (primary layout system)

**Style ID:** `bento-box-grid`  
**Keywords:** modular cards, varied sizes, negative space, clean hierarchy

### Grid rules

| Breakpoint | Columns | Catatan |
|------------|---------|---------|
| Mobile (<640px) | **1 kolom** | Kartu full width, urutan logis |
| Tablet (≥768px) | **2 kolom** | Hero bisa span 2; pendukung 1–2 kolom |
| Desktop (≥1024px) | **4 kolom** (`grid-template-columns: repeat(4, 1fr)`) | Span bervariasi |
| Wide (≥1440px) | Max width konten ~1120–1200px, centered | Jangan stretch penuh tanpa batas |

```css
/* Referensi teknis (dari skill bento-box-grid) */
.bento {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl); /* 16–24px */
  grid-auto-rows: minmax(140px, auto);
}
```

### Kartu & span

- **Hero = kartu utama** lebih besar: `col-span-2 row-span-2` (atau `md:col-span-2 lg:col-span-2 lg:row-span-2`)
- Pendukung: statistik, layanan, profil singkat, CTA — span 1×1 atau 2×1
- Komposisi seimbang: jangan semua kartu kecil; sediakan whitespace di dalam dan antar kartu
- Konten **tidak boleh overflow** atau memaksa tinggi tetap yang memotong teks
- Kartu usable **tanpa hover** (hover hanya polish)

### Interaksi kartu

- Hover: optional `scale(1.02)` atau shadow naik tipis, transition **200–300ms**
- Jangan layout-shift berlebihan; jangan tilt 3D dekoratif
- Focus ring terlihat jika kartu/link interaktif

### Aksesibilitas layout

- DOM reading order = urutan visual yang masuk akal untuk screen reader
- Kartu bukan hanya dekoratif; setiap kartu punya judul/label yang jelas
- Touch target interaktif ≥ **44×44px**
- Kontras teks ≥ **4.5:1**

---

## Page Pattern: Bento Grid Showcase

**Pattern ID:** `bento-grid-showcase`  
**Section order:**

1. **Welcome / intro** (opsional singkat) → fade-in nama `ngodinglagi`
2. **Hero card** (lebih besar) — identitas + one-liner + CTA utama
3. **Bento supporting grid:**
   - Statistik nyata: 23 proyek SA-MP · 8 proyek website
   - Layanan: Web Development & Deployment · SA-MP/Open.MP Development · VPS & Server Administration
   - Profil singkat (hanya fakta yang ada di brief)
   - CTA card: hubungi / minta penawaran
4. Footer minimal

**Color strategy (skill):** card background netral/putih, teks gelap, aksen brand hemat  
**Conversion:** value props scannable; mobile stack; kartu tetap tanpa hover di reduced motion

---

## Components

### Buttons

```css
.btn-primary {
  background: var(--color-accent); /* #0D9488 */
  color: #FFFFFF;
  min-height: 44px;
  padding: 12px 24px;
  border-radius: var(--radius-sm);
  font-weight: 600;
  cursor: pointer;
  transition: background-color 200ms ease, box-shadow 200ms ease;
}
.btn-primary:hover { background: #0F766E; }
.btn-primary:focus-visible {
  outline: 2px solid var(--color-ring);
  outline-offset: 2px;
}

.btn-secondary {
  background: transparent;
  color: var(--color-foreground);
  border: 1px solid var(--color-border);
  min-height: 44px;
  padding: 12px 24px;
  border-radius: var(--radius-sm);
  font-weight: 600;
  cursor: pointer;
  transition: border-color 200ms ease, background-color 200ms ease;
}
```

### Card (bento)

```css
.card {
  background: var(--color-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-lg);
  box-shadow: var(--shadow-card);
  transition: box-shadow 250ms ease, transform 250ms ease;
}
.card:hover {
  box-shadow: var(--shadow-card-hover);
}
.card:focus-visible {
  outline: 2px solid var(--color-ring);
  outline-offset: 2px;
}
```

### Stat chip / angka

- Angka besar (Space Grotesk 600–700), label kecil muted
- Contoh nyata saja: `23` proyek SA-MP, `8` proyek website

### Icons

- SVG set konsisten: **Lucide** atau **Heroicons**
- Selalu ada accessible name (visible label atau `aria-label`)
- **Tidak ada emoji sebagai ikon**

---

## Motion

### Welcome animation (brief)

1. Fade-in singkat teks **“ngodinglagi”** (opacity 0→1, ~400–500ms, ease-out)
2. Transisi lembut ke Bento Grid (fade/slide kecil y 8–12px, stagger kartu kecil 30–50ms)
3. Total intro **jangan menahan akses** — konten tetap di DOM, accessible, dan tidak butuh klik untuk “masuk”
4. Setelah intro selesai, tidak ada animasi loop/dekoratif

```js
// Pola (subtle) — hormati reduced motion
const mm = gsap.matchMedia();
mm.add('(prefers-reduced-motion: no-preference)', () => {
  gsap.from('.brand-intro', { opacity: 0, duration: 0.45, ease: 'power1.out' });
  gsap.from('.bento .card', {
    opacity: 0, y: 12, duration: 0.35, stagger: 0.04,
    ease: 'power1.out', delay: 0.2
  });
});
// prefers-reduced-motion: reduce → render state akhir tanpa animasi
```

Atau pure CSS dengan `@media (prefers-reduced-motion: reduce) { animation: none; }`.

### Scroll reveal (opsional, subtle)

- Duration **300–400ms**, ease `power1.out`, y offset **8–16px**
- Maksimal 1–2 elemen utama per view yang dianimasikan
- Konten below-the-fold **tidak** disembunyikan default tanpa no-JS fallback

---

## Anti-Patterns (Do NOT Use)

- ❌ Emoji sebagai ikon
- ❌ Neon, glitch, terminal aesthetic, ASCII art dekoratif
- ❌ Gradient ungu/pink khas AI generik; gradient berlebihan
- ❌ Glow berlebihan / glassmorphism tebal
- ❌ Dashboard SaaS padat chart yang tidak relevan
- ❌ Hover-only interaksi penting
- ❌ Instant state change (0ms)
- ❌ Kontras rendah; focus ring dihapus
- ❌ Horizontal scroll; zoom disabled
- ❌ Testimoni/klien/sertifikasi/stats karangan
- ❌ Animasi yang menunda akses ke konten

---

## Pre-Delivery Checklist

- [ ] Layout bento: 4→2→1 kolom (desktop→tablet→mobile)
- [ ] Hero card span lebih besar dari kartu pendukung
- [ ] Gap & radius konsisten; shadow sangat ringan
- [ ] Palet muted mint/teal + bg off-white; tanpa neon
- [ ] Font: Space Grotesk (heading) + DM Sans (body), base 16px
- [ ] Welcome fade-in `ngodinglagi` singkat, tidak memblokir akses
- [ ] `prefers-reduced-motion` dihormati (intro & reveal)
- [ ] Ikon SVG (Lucide/Heroicons), tanpa emoji
- [ ] Kontras teks ≥ 4.5:1; focus-visible terlihat
- [ ] Touch target ≥ 44×44px
- [ ] Data hanya: 23 SA-MP, 8 website — tanpa konten karangan
- [ ] Responsive dicek: 375 / 768 / 1024 / 1440
- [ ] Tanpa horizontal scroll; nav keyboard-friendly
