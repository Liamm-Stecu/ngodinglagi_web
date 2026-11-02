<x-layout
    :title="'Syarat & Ketentuan — LagiNgoding'"
    description="Syarat dan ketentuan penggunaan layanan LagiNgoding."
>
    <section class="relative overflow-hidden border-b border-border/50">
        <div class="mesh-gradient" aria-hidden="true"></div>
        <div class="grid-pattern" aria-hidden="true"></div>
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="decorative-blob -right-16 -top-20 size-64 bg-secondary/10 sm:size-80"></div>
            <div class="decorative-blob -bottom-24 -left-12 size-48 bg-primary/6" style="animation-delay: 1.8s"></div>
        </div>

        <div class="relative mx-auto w-full max-w-3xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8 lg:py-20">
            <div class="max-w-2xl space-y-4">
                <p class="animate-rise-in inline-flex items-center gap-2 rounded-full border border-primary/15 bg-primary/5 px-3 py-1 text-xs font-semibold uppercase tracking-[0.14em] text-primary">
                    Legal
                </p>
                <h1 class="animate-rise-in font-heading text-2xl font-semibold leading-tight tracking-tight text-foreground sm:text-4xl lg:text-5xl" style="animation-delay: 70ms">
                    Syarat &amp; Ketentuan
                </h1>
                <p class="animate-rise-in text-sm text-muted-foreground" style="animation-delay: 140ms">
                    Terakhir diperbarui: 20 Oktober 2026
                </p>
            </div>
        </div>
    </section>

    <section class="mx-auto w-full max-w-3xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8">
        <div class="space-y-8 text-sm leading-relaxed text-muted-foreground">
            <section class="space-y-2">
                <h2 class="font-heading text-base font-semibold text-foreground">1. Lingkup layanan</h2>
                <p>LagiNgoding menyediakan jasa pengembangan website, pengembangan SA-MP/Open.MP, dan administrasi VPS/server. Setiap proyek memiliki lingkup kerja yang disepakati sebelum pengerjaan dimulai.</p>
            </section>

            <section class="space-y-2">
                <h2 class="font-heading text-base font-semibold text-foreground">2. Harga &amp; pembayaran</h2>
                <p>Harga di website adalah estimasi "mulai dari". Harga final ditentukan setelah diskusi lingkup kerja. Pembayaran dilakukan sesuai kesepakatan (DP dan pelunasan, atau penuh di awal).</p>
            </section>

            <section class="space-y-2">
                <h2 class="font-heading text-base font-semibold text-foreground">3. Revisi</h2>
                <p>Revisi minor (typography, warna, perubahan teks kecil) gratis dalam 7 hari setelah handover. Perubahan fitur atau desain besar dihitung terpisah.</p>
            </section>

            <section class="space-y-2">
                <h2 class="font-heading text-base font-semibold text-foreground">4. Hak kekayaan intelektual</h2>
                <p>Setelah pelunasan, hak atas hasil pengerjaan (kode, desain) berpindah ke klien. LagiNgoding berhak menampilkan hasil kerja di portofolio/website kecuali diminta tidak.</p>
            </section>

            <section class="space-y-2">
                <h2 class="font-heading text-base font-semibold text-foreground">5. Pembatalan</h2>
                <p>Jika klien membatalkan proyek di tengah jalan, pembayaran yang sudah masuk tidak dapat dikembalikan untuk bagian pekerjaan yang sudah selesai.</p>
            </section>

            <section class="space-y-2">
                <h2 class="font-heading text-base font-semibold text-foreground">6. Kontak</h2>
                <p>Pertanyaan soal syarat ini bisa lewat <a href="{{ route('kontak') }}" class="font-medium text-primary underline underline-offset-4">halaman kontak</a>.</p>
            </section>
        </div>

        <div class="mt-10 border-t border-border pt-6">
            <a href="{{ route('home') }}" class="btn-secondary">
                Kembali ke beranda
            </a>
        </div>
    </section>
</x-layout>
