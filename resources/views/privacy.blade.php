<x-layout
    :title="'Kebijakan Privasi — LagiNgoding'"
    description="Kebijakan privasi LagiNgoding: data apa yang dikumpulkan dan bagaimana digunakan."
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
                    Privacy Policy
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
                <h2 class="font-heading text-base font-semibold text-foreground">1. Data yang dikumpulkan</h2>
                <p>Ketika kamu mengirim pesan melalui form kontak di website ini, kami menyimpan:</p>
                <ul class="ml-5 list-disc space-y-1">
                    <li>Nama</li>
                    <li>Email (opsional)</li>
                    <li>Isi pesan</li>
                </ul>
                <p>Data ini hanya digunakan untuk membalas pertanyaan atau permintaan jasa kamu.</p>
            </section>

            <section class="space-y-2">
                <h2 class="font-heading text-base font-semibold text-foreground">2. Penggunaan data</h2>
                <p>Data yang dikumpulkan <strong class="text-foreground">tidak dibagikan</strong> ke pihak ketiga, dijual, atau digunakan untuk keperluan lain di luar komunikasi terkait layanan LagiNgoding.</p>
            </section>

            <section class="space-y-2">
                <h2 class="font-heading text-base font-semibold text-foreground">3. Cookie &amp; analitik</h2>
                <p>Website ini tidak menggunakan cookie pelacakan. Jika analitik diaktifkan di masa depan, kebijakan ini akan diperbarui terlebih dahulu.</p>
            </section>

            <section class="space-y-2">
                <h2 class="font-heading text-base font-semibold text-foreground">4. Hak kamu</h2>
                <p>Kamu bisa meminta data yang tersimpan dihapus kapan saja melalui <a href="{{ route('kontak') }}" class="font-medium text-primary underline underline-offset-4">halaman kontak</a>.</p>
            </section>

            <section class="space-y-2">
                <h2 class="font-heading text-base font-semibold text-foreground">5. Perubahan kebijakan</h2>
                <p>Kebijakan ini bisa berubah sewaktu-waktu. Tanggal pembaruan selalu dicantumkan di bagian atas halaman.</p>
            </section>
        </div>

        <div class="mt-10 border-t border-border pt-6">
            <a href="{{ route('home') }}" class="btn-secondary">
                Kembali ke beranda
            </a>
        </div>
    </section>
</x-layout>
