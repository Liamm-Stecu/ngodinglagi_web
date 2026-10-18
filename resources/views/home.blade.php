<x-layout>
    {{-- Hero --}}
    <section id="beranda" class="relative overflow-hidden border-b border-border/60">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="decorative-blob -right-20 -top-28 size-72 bg-secondary/12 sm:size-96"></div>
            <div class="decorative-blob -bottom-32 -left-24 size-64 bg-primary/8" style="animation-delay: 2s"></div>
            <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
        </div>

        <div class="relative mx-auto grid w-full max-w-6xl gap-10 px-4 py-12 sm:px-6 sm:py-16 lg:grid-cols-12 lg:items-center lg:gap-12 lg:px-8 lg:py-24">
            <div class="animate-rise-in space-y-6 lg:col-span-7">
                <p class="inline-flex items-center gap-2 rounded-full border border-primary/15 bg-primary/5 px-3 py-1 text-xs font-semibold uppercase tracking-[0.14em] text-primary">
                    <span class="relative flex size-1.5" aria-hidden="true">
                        <span class="absolute inline-flex size-full animate-ping rounded-full bg-secondary opacity-75"></span>
                        <span class="relative inline-flex size-1.5 rounded-full bg-secondary"></span>
                    </span>
                    NgodingLagi?
                </p>

                <h1 id="hero-heading" class="font-heading text-4xl font-semibold leading-[1.1] tracking-tight text-foreground sm:text-5xl lg:text-6xl">
                    Bantuan teknis<br class="hidden sm:block">
                    yang <span class="text-primary">rapi &amp; jelas</span>
                </h1>

                <p class="max-w-xl text-base leading-relaxed text-muted-foreground sm:text-lg">
                    Website, server game SA-MP/Open.MP, dan infrastruktur VPS — dikerjakan tanpa drama, komunikasi jelas dari awal.
                </p>

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a href="{{ route('layanan') }}" class="btn-primary">
                        Lihat layanan
                        <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m12 5 7 7-7 7" />
                        </svg>
                    </a>
                    <a href="{{ route('kontak') }}" class="btn-secondary">
                        Hubungi sekarang
                    </a>
                </div>

                <ul class="flex flex-wrap gap-2 pt-2" aria-label="Bidang layanan">
                    @foreach (['Web', 'SA-MP / Open.MP', 'VPS & Server'] as $tag)
                        <li class="rounded-full border border-border bg-card px-3 py-1 text-xs font-medium text-muted-foreground">
                            {{ $tag }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="animate-rise-in grid gap-3 sm:grid-cols-2 lg:col-span-5" style="animation-delay: 120ms">
                <article class="card-bento card-bento-hover flex min-h-36 flex-col justify-between gap-4 sm:col-span-2 sm:min-h-44">
                    <div class="flex items-center gap-3">
                        <span class="flex size-9 items-center justify-center rounded-lg bg-primary text-on-primary" aria-hidden="true">
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 17.5a5 5 0 0 0 5-5c0-3.5-2-6.5-5-10.5-5 4-5 7-5 10.5a5 5 0 0 0 5 5Z" />
                                <circle cx="12" cy="12.5" r="1.5" fill="currentColor" stroke="none" />
                            </svg>
                        </span>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">Fokus</p>
                            <p class="font-heading text-sm font-semibold text-foreground">Individu · Komunitas · Bisnis</p>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Dari landing page sampai setup VPS production — lingkup kerja disepakati di awal, hasilnya bisa dipakai.
                    </p>
                </article>

                <article class="card-bento card-bento-hover flex flex-col justify-between gap-3 p-5" aria-labelledby="stat-samp">
                    <div class="flex size-9 items-center justify-center rounded-lg bg-muted text-primary" aria-hidden="true">
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="6" x2="6" y1="11" y2="16" />
                            <line x1="10" x2="10" y1="6" y2="16" />
                            <line x1="14" x2="14" y1="8" y2="16" />
                            <line x1="18" x2="18" y1="5" y2="16" />
                            <path d="M4 20h16" />
                        </svg>
                    </div>
                    <div>
                        <p id="stat-samp" class="font-heading text-3xl font-semibold tracking-tight text-foreground sm:text-4xl" data-count-to="23">
                            23
                        </p>
                        <p class="mt-0.5 text-xs leading-snug text-muted-foreground sm:text-sm">
                            Proyek SA-MP selesai
                        </p>
                    </div>
                </article>

                <article class="card-bento card-bento-hover flex flex-col justify-between gap-3 p-5" aria-labelledby="stat-web">
                    <div class="flex size-9 items-center justify-center rounded-lg bg-muted text-primary" aria-hidden="true">
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="18" x="3" y="3" rx="2" />
                            <path d="M3 9h18" />
                            <path d="M9 21V9" />
                        </svg>
                    </div>
                    <div>
                        <p id="stat-web" class="font-heading text-3xl font-semibold tracking-tight text-foreground sm:text-4xl" data-count-to="8">
                            8
                        </p>
                        <p class="mt-0.5 text-xs leading-snug text-muted-foreground sm:text-sm">
                            Proyek website selesai
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- Tentang + Layanan --}}
    <section class="mx-auto w-full max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
        <div class="grid gap-4 sm:gap-5 lg:grid-cols-12">
            <article
                id="tentang"
                class="card-bento card-bento-hover reveal flex flex-col justify-center gap-4 lg:col-span-5"
                data-reveal
                aria-labelledby="profil-heading"
            >
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-primary text-on-primary" aria-hidden="true">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 17.5a5 5 0 0 0 5-5c0-3.5-2-6.5-5-10.5-5 4-5 7-5 10.5a5 5 0 0 0 5 5Z" />
                                <circle cx="12" cy="12.5" r="1.5" fill="currentColor" stroke="none" />
                            </svg>
                        </div>
                        <h2 id="profil-heading" class="font-heading text-xl font-semibold tracking-tight text-foreground">
                            Tentang ngodinglagi
                        </h2>
                    </div>
                    <p class="text-sm leading-relaxed text-muted-foreground sm:text-base">
                        Fokus pada jasa teknologi untuk individu, komunitas game, dan bisnis: website, SA-MP/Open.MP, serta setup VPS. Komunikasi jelas, hasil yang bisa dipakai.
                    </p>
                </div>

                <ul class="space-y-2.5 border-t border-border pt-4 text-sm text-muted-foreground" aria-label="Nilai kerja">
                    @foreach (['Lingkup kerja jelas sebelum mulai', 'Update progress tanpa perlu ditanya', 'Hasil siap dipakai, bukan setengah jadi'] as $point)
                        <li class="flex items-start gap-2.5">
                            <svg class="mt-0.5 size-4 shrink-0 text-primary" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            {{ $point }}
                        </li>
                    @endforeach
                </ul>
            </article>

            <div id="layanan" class="grid content-start gap-4 sm:gap-5 lg:col-span-7">
                <header class="reveal" data-reveal>
                    <p class="text-xs font-semibold uppercase tracking-[0.14em] text-primary">Layanan</p>
                    <h2 class="mt-2 font-heading text-2xl font-semibold tracking-tight text-foreground sm:text-3xl">
                        Apa yang bisa dikerjakan
                    </h2>
                </header>

                <div class="grid gap-3 sm:gap-4 sm:grid-cols-2">
                    <article
                        class="card-bento card-bento-hover card-accent-top reveal flex flex-col gap-3 sm:col-span-2"
                        data-reveal
                        aria-labelledby="layanan-web"
                    >
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex size-10 items-center justify-center rounded-xl bg-muted text-primary" aria-hidden="true">
                                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="16 18 22 12 16 6" />
                                    <polyline points="8 6 2 12 8 18" />
                                </svg>
                            </div>
                            <span class="font-heading text-xs font-medium uppercase tracking-widest text-muted-foreground/70" aria-hidden="true">01</span>
                        </div>
                        <div class="space-y-1.5">
                            <h3 id="layanan-web" class="font-heading text-lg font-semibold tracking-tight text-foreground">
                                Web Development &amp; Deployment
                            </h3>
                            <p class="text-sm leading-relaxed text-muted-foreground">
                                Pembuatan website, deployment, domain, SSL, maintenance, dan troubleshooting.
                            </p>
                            <p class="text-xs font-medium text-primary">
                                Mulai {{ data_get($services, '0.pricing.tiers.0.price', '') }}
                            </p>
                        </div>
                    </article>

                    <article
                        class="card-bento card-bento-hover card-accent-top reveal flex flex-col gap-3"
                        data-reveal
                        style="transition-delay: 60ms"
                        aria-labelledby="layanan-samp"
                    >
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex size-10 items-center justify-center rounded-xl bg-muted text-primary" aria-hidden="true">
                                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 11h4" />
                                    <path d="M8 9v4" />
                                    <path d="M15 12h.01" />
                                    <path d="M18 10h.01" />
                                    <path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z" />
                                </svg>
                            </div>
                            <span class="font-heading text-xs font-medium uppercase tracking-widest text-muted-foreground/70" aria-hidden="true">02</span>
                        </div>
                        <div class="space-y-1.5">
                            <h3 id="layanan-samp" class="font-heading text-base font-semibold tracking-tight text-foreground sm:text-lg">
                                SA-MP / Open.MP
                            </h3>
                            <p class="text-sm leading-relaxed text-muted-foreground">
                                Scripting Pawn, sistem roleplay, MySQL, UCP, debugging, dan optimasi.
                            </p>
                            <p class="text-xs font-medium text-primary">
                                Mulai {{ data_get($services, '1.pricing.tiers.0.price', '') }}
                            </p>
                        </div>
                    </article>

                    <article
                        class="card-bento card-bento-hover card-accent-top reveal flex flex-col gap-3"
                        data-reveal
                        style="transition-delay: 120ms"
                        aria-labelledby="layanan-vps"
                    >
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex size-10 items-center justify-center rounded-xl bg-muted text-primary" aria-hidden="true">
                                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="8" x="2" y="2" rx="2" ry="2" />
                                    <rect width="20" height="8" x="2" y="14" rx="2" ry="2" />
                                    <line x1="6" x2="6.01" y1="6" y2="6" />
                                    <line x1="6" x2="6.01" y1="18" y2="18" />
                                </svg>
                            </div>
                            <span class="font-heading text-xs font-medium uppercase tracking-widest text-muted-foreground/70" aria-hidden="true">03</span>
                        </div>
                        <div class="space-y-1.5">
                            <h3 id="layanan-vps" class="font-heading text-base font-semibold tracking-tight text-foreground sm:text-lg">
                                VPS &amp; Server Admin
                            </h3>
                            <p class="text-sm leading-relaxed text-muted-foreground">
                                Setup Linux, panel, web server, keamanan dasar, backup, dan troubleshooting.
                            </p>
                            <p class="text-xs font-medium text-primary">
                                Mulai {{ data_get($services, '2.pricing.tiers.0.price', '') }}
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    {{-- Promosi mitra --}}
    <section class="mx-auto w-full max-w-6xl px-4 py-10 sm:px-6 sm:py-12 lg:px-8">
        <div class="reveal relative overflow-hidden rounded-2xl border border-primary/12 bg-linear-to-br from-primary/[0.04] via-card to-secondary/[0.06] p-6 sm:p-8" data-reveal>
            <div class="pointer-events-none absolute -right-12 -top-12 size-40 rounded-full bg-primary/[0.05]" aria-hidden="true"></div>
            <div class="pointer-events-none absolute -bottom-16 right-24 size-32 rounded-full bg-secondary/[0.06]" aria-hidden="true"></div>

            <div class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between lg:gap-10">
                <div class="flex items-start gap-4 sm:gap-5">
                    <span class="flex size-12 shrink-0 items-center justify-center rounded-xl bg-primary text-on-primary shadow-[0_4px_12px_rgba(15,118,110,0.22)]" aria-hidden="true">
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 20h20" />
                            <path d="M5 20V8l7-5 7 5v12" />
                            <path d="M9 20v-6h6v6" />
                        </svg>
                    </span>
                    <div class="space-y-2">
                        <p class="inline-flex items-center gap-1.5 rounded-full border border-border bg-card px-2.5 py-0.5 text-[11px] font-semibold uppercase tracking-wider text-muted-foreground">
                            Mitra
                        </p>
                        <h2 class="font-heading text-xl font-semibold tracking-tight text-foreground sm:text-2xl">
                            Wide Host Media
                        </h2>
                        <p class="max-w-xl text-sm leading-relaxed text-muted-foreground sm:text-base">
                            Hosting, domain, VPS, SSL, sampai colocation — kalau butuh infrastruktur, pesan langsung ke mereka. Billing &amp; support ditangani penuh sama Wide Host Media.
                        </p>
                    </div>
                </div>

                <a
                    href="{{ config('products.affiliate_url') }}"
                    target="_blank"
                    rel="noopener noreferrer sponsored"
                    class="group btn-primary shrink-0 self-start lg:self-center"
                >
                    Kunjungi situs
                    <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Kontak --}}
    <section id="kontak" class="mx-auto w-full max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
        <article
            class="card-bento reveal relative overflow-hidden border-primary/20 bg-primary text-on-primary"
            data-reveal
            aria-labelledby="kontak-heading"
        >
            <div class="pointer-events-none absolute -right-16 -top-16 size-56 rounded-full bg-white/5" aria-hidden="true"></div>
            <div class="pointer-events-none absolute -bottom-20 left-1/3 size-44 rounded-full bg-white/5" aria-hidden="true"></div>

            <div class="relative grid gap-8 lg:grid-cols-2 lg:items-start lg:gap-10">
                <div class="space-y-3">
                    <h2 id="kontak-heading" class="font-heading text-2xl font-semibold tracking-tight sm:text-3xl">
                        Diskusikan proyek Anda
                    </h2>
                    <p class="max-w-xl text-sm leading-relaxed text-on-primary/90 sm:text-base">
                        Butuh website, bantuan server game, atau setup VPS? Ceritakan kebutuhannya — kita bahas lingkup kerja yang jelas dari awal.
                    </p>

                    <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                        <a
                            href="{{ route('kontak') }}"
                            class="group inline-flex min-h-11 items-center justify-center gap-2 rounded-lg bg-on-primary px-6 py-3 text-sm font-semibold text-primary transition-all duration-200 hover:bg-white hover:shadow-[0_8px_20px_rgba(15,23,42,0.18)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                        >
                            Halaman kontak
                            <svg aria-hidden="true" class="size-4 transition-transform duration-200 ease-out group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14" />
                                <path d="m12 5 7 7-7 7" />
                            </svg>
                        </a>
                        <a
                            href="{{ route('portofolio') }}"
                            class="inline-flex min-h-11 items-center justify-center rounded-lg border border-on-primary/30 px-6 py-3 text-sm font-semibold text-on-primary transition-all duration-200 hover:bg-white/10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                        >
                            Lihat portofolio
                        </a>
                    </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-1">
                    <x-contact-chip
                        variant="dark"
                        :href="config('contact.whatsapp.url')"
                        :label="config('contact.whatsapp.label')"
                        :display="config('contact.whatsapp.display')"
                    >
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                    </x-contact-chip>

                    <x-contact-chip
                        variant="dark"
                        :href="config('contact.instagram.url')"
                        :label="config('contact.instagram.label')"
                        :display="config('contact.instagram.display')"
                    >
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                        </svg>
                    </x-contact-chip>

                    <x-contact-chip
                        variant="dark"
                        copyable
                        class="sm:col-span-2 lg:col-span-1"
                        :label="config('contact.discord.label')"
                        :display="config('contact.discord.display')"
                    >
                        <svg class="size-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z" />
                        </svg>
                    </x-contact-chip>
                </div>
            </div>
        </article>
    </section>
</x-layout>
