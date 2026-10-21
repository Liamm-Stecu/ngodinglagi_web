<x-layout
    :title="'Tentang — ngodinglagi'"
    description="Kenali ngodinglagi: jasa web development, SA-MP/Open.MP, dan VPS/server administration dengan komunikasi jelas."
>
    {{-- Header --}}
    <section class="relative overflow-hidden border-b border-border/50">
        <div class="mesh-gradient" aria-hidden="true"></div>
        <div class="grid-pattern" aria-hidden="true"></div>
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="decorative-blob -right-16 -top-20 size-64 bg-secondary/10 sm:size-80"></div>
            <div class="decorative-blob -bottom-24 -left-12 size-48 bg-primary/6" style="animation-delay: 1.8s"></div>
        </div>

        <div class="relative mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8 lg:py-20">
            <div class="max-w-2xl space-y-4">
                <p class="animate-rise-in inline-flex items-center gap-2 rounded-full border border-primary/15 bg-primary/5 px-3 py-1 text-xs font-semibold uppercase tracking-[0.14em] text-primary">
                    Tentang
                </p>
                <h1 class="animate-rise-in font-heading text-2xl font-semibold leading-tight tracking-tight text-foreground sm:text-4xl lg:text-5xl" style="animation-delay: 70ms">
                    Kenali ngodinglagi
                </h1>
                <p class="animate-rise-in text-[15px] leading-relaxed text-muted-foreground sm:text-lg" style="animation-delay: 140ms">
                    Bantuan teknis untuk website, server game SA-MP/Open.MP, dan infrastruktur VPS —
                    dikerjakan tanpa drama, dengan komunikasi jelas dari awal sampai selesai.
                </p>
            </div>

            <div class="mt-6 grid gap-2.5 sm:mt-8 sm:grid-cols-2 sm:gap-4">
                <div class="card-glass animate-rise-in flex items-end justify-between gap-3 p-4 sm:p-6" style="animation-delay: 200ms" aria-label="Total proyek SA-MP">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">SA-MP / Open.MP</p>
                        <p class="mt-1 font-heading text-3xl font-semibold tracking-tight text-foreground sm:text-5xl" data-count-to="{{ $stats['samp'] }}">
                            {{ $stats['samp'] }}
                        </p>
                        <p class="mt-1 text-sm text-muted-foreground">Proyek selesai</p>
                    </div>
                    <span class="flex size-11 items-center justify-center rounded-xl bg-muted text-primary" aria-hidden="true">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="6" x2="6" y1="11" y2="16" />
                            <line x1="10" x2="10" y1="6" y2="16" />
                            <line x1="14" x2="14" y1="8" y2="16" />
                            <line x1="18" x2="18" y1="5" y2="16" />
                            <path d="M4 20h16" />
                        </svg>
                    </span>
                </div>

                <div class="card-glass animate-rise-in flex items-end justify-between gap-3 p-4 sm:p-6" style="animation-delay: 280ms" aria-label="Total proyek website">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">Website</p>
                        <p class="mt-1 font-heading text-3xl font-semibold tracking-tight text-foreground sm:text-5xl" data-count-to="{{ $stats['web'] }}">
                            {{ $stats['web'] }}
                        </p>
                        <p class="mt-1 text-sm text-muted-foreground">Proyek selesai</p>
                    </div>
                    <span class="flex size-11 items-center justify-center rounded-xl bg-muted text-primary" aria-hidden="true">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="18" x="3" y="3" rx="2" />
                            <path d="M3 9h18" />
                            <path d="M9 21V9" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- Siapa & cara kerja --}}
    <section class="mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8">
        <div class="grid gap-4 sm:gap-5 lg:grid-cols-12">
            <article class="card-bento card-bento-hover reveal flex flex-col justify-center gap-4 lg:col-span-5" data-reveal="left" aria-labelledby="siapa-heading">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-primary text-on-primary" aria-hidden="true">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 17.5a5 5 0 0 0 5-5c0-3.5-2-6.5-5-10.5-5 4-5 7-5 10.5a5 5 0 0 0 5 5Z" />
                            <circle cx="12" cy="12.5" r="1.5" fill="currentColor" stroke="none" />
                        </svg>
                    </div>
                    <h2 id="siapa-heading" class="font-heading text-xl font-semibold tracking-tight text-foreground">
                        Siapa ngodinglagi?
                    </h2>
                </div>
                <p class="text-sm leading-relaxed text-muted-foreground sm:text-base">
                    Layanan jasa teknologi untuk individu, komunitas game, dan bisnis.
                    Fokusnya sederhana: masalah teknis yang clear, dikerjakan rapi, dan hasilnya bisa langsung dipakai —
                    bukan setengah jadi.
                </p>
                <p class="text-sm leading-relaxed text-muted-foreground sm:text-base">
                    Lingkup kerja selalu disepakati di awal. Progress dikabari tanpa perlu ditanya terus.
                    Kalau ada kendala, komunikasinya jalan — bukan menghilang.
                </p>
            </article>

            <div class="grid content-start gap-4 sm:gap-5 lg:col-span-7">
                <header class="reveal" data-reveal="right">
                    <p class="text-xs font-semibold uppercase tracking-[0.14em] text-primary">Cara kerja</p>
                    <h2 class="mt-2 font-heading text-xl font-semibold tracking-tight text-foreground sm:text-3xl">
                        Prinsip yang dipegang
                    </h2>
                </header>

                <ul class="grid gap-3 sm:grid-cols-2" data-stagger>
                    <li class="card-bento card-bento-hover reveal flex items-start gap-3" data-reveal>
                        <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-muted text-primary" aria-hidden="true">
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                        </span>
                        <div>
                            <p class="font-heading text-sm font-semibold text-foreground">Lingkup jelas di awal</p>
                            <p class="mt-0.5 text-sm leading-relaxed text-muted-foreground">Apa yang dikerjakan, apa yang tidak — disepakati sebelum mulai.</p>
                        </div>
                    </li>
                    <li class="card-bento card-bento-hover reveal flex items-start gap-3" data-reveal>
                        <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-muted text-primary" aria-hidden="true">
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg>
                        </span>
                        <div>
                            <p class="font-heading text-sm font-semibold text-foreground">Update tanpa ditanya</p>
                            <p class="mt-0.5 text-sm leading-relaxed text-muted-foreground">Progres dikabari berkala supaya kamu tahu posisi pekerjaan.</p>
                        </div>
                    </li>
                    <li class="card-bento card-bento-hover reveal flex items-start gap-3" data-reveal>
                        <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-muted text-primary" aria-hidden="true">
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                        </span>
                        <div>
                            <p class="font-heading text-sm font-semibold text-foreground">Hasil siap pakai</p>
                            <p class="mt-0.5 text-sm leading-relaxed text-muted-foreground">Bukan demo setengah jadi — deliverable yang bisa langsung dipakai.</p>
                        </div>
                    </li>
                    <li class="card-bento card-bento-hover reveal flex items-start gap-3" data-reveal>
                        <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-muted text-primary" aria-hidden="true">
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                        </span>
                        <div>
                            <p class="font-heading text-sm font-semibold text-foreground">Responsif & to the point</p>
                            <p class="mt-0.5 text-sm leading-relaxed text-muted-foreground">Diskusi efisien. Tidak bertele-tele, fokus ke solusi.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- Bidang --}}
    <section class="mx-auto w-full max-w-6xl space-y-4 px-4 py-8 sm:space-y-5 sm:px-6 sm:py-14 lg:px-8">
        <header class="reveal max-w-2xl" data-reveal>
            <p class="text-xs font-semibold uppercase tracking-[0.14em] text-primary">Bidang</p>
            <h2 class="mt-2 font-heading text-xl font-semibold tracking-tight text-foreground sm:text-3xl">
                Tiga fokus utama
            </h2>
            <p class="mt-2 text-sm leading-relaxed text-muted-foreground sm:text-base">
                Setiap bidang punya cakupan kerja yang jelas. Detail &amp; harga ada di halaman layanan.
            </p>
        </header>

        @foreach ($categories as $index => $category)
            <article
                class="card-bento card-bento-hover card-accent-top reveal flex flex-col gap-5 p-6 sm:p-8"
                data-reveal="scale"
                style="transition-delay: {{ $index * 60 }}ms"
                aria-labelledby="bidang-{{ $category['slug'] }}"
            >
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                    <div class="max-w-2xl space-y-2">
                        <h2 id="bidang-{{ $category['slug'] }}" class="font-heading text-xl font-semibold tracking-tight text-foreground sm:text-2xl">
                            {{ $category['title'] }}
                        </h2>
                        <p class="text-sm leading-relaxed text-muted-foreground sm:text-base">
                            {{ $category['description'] }}
                        </p>
                    </div>
                    <span class="font-heading text-xs font-medium uppercase tracking-widest text-muted-foreground/70" aria-hidden="true">
                        {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                    </span>
                </div>

                <ul class="grid gap-2 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($category['items'] as $item)
                        <li class="flex items-start gap-2.5 rounded-xl border border-border/80 bg-muted/50 px-3.5 py-3 text-sm text-foreground">
                            <svg class="mt-0.5 size-4 shrink-0 text-primary" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </article>
        @endforeach
    </section>

    {{-- Testimoni (hanya tampil jika ada data asli dari config) --}}
    @php $testimonials = config('content.testimonials', []); @endphp
    @if (! empty($testimonials))
        <section class="border-t border-border/60 bg-muted/30" aria-labelledby="testimoni-heading">
            <div class="mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8 lg:py-16">
                <p class="inline-flex items-center gap-2 rounded-full border border-primary/15 bg-primary/5 px-3 py-1 text-xs font-semibold uppercase tracking-[0.14em] text-primary">
                    Testimoni
                </p>
                <h2 id="testimoni-heading" class="mt-4 font-heading text-xl font-semibold tracking-tight text-foreground sm:text-3xl">
                    Kata mereka
                </h2>

                <div class="mt-6 grid gap-3 sm:mt-8 sm:grid-cols-2 lg:grid-cols-3 sm:gap-4" data-stagger>
                    @foreach ($testimonials as $testimonial)
                        <figure class="card-bento reveal flex flex-col gap-3 p-5 sm:p-6" data-reveal>
                            <blockquote class="text-sm leading-relaxed text-muted-foreground">
                                "{{ $testimonial['quote'] }}"
                            </blockquote>
                            <figcaption class="mt-auto border-t border-border pt-3 text-sm">
                                <p class="font-semibold text-foreground">{{ $testimonial['name'] }}</p>
                                <p class="text-xs text-muted-foreground">{{ $testimonial['role'] }}</p>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Case study (hanya tampil jika ada data asli dari config) --}}
    @php $caseStudies = config('content.case_studies', []); @endphp
    @if (! empty($caseStudies))
        <section class="border-t border-border/60" aria-labelledby="case-heading">
            <div class="mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8 lg:py-16">
                <p class="inline-flex items-center gap-2 rounded-full border border-primary/15 bg-primary/5 px-3 py-1 text-xs font-semibold uppercase tracking-[0.14em] text-primary">
                    Studi kasus
                </p>
                <h2 id="case-heading" class="mt-4 font-heading text-xl font-semibold tracking-tight text-foreground sm:text-3xl">
                    Proyek yang menarik dibahas
                </h2>

                <div class="mt-6 space-y-3 sm:mt-8 sm:space-y-4" data-stagger>
                    @foreach ($caseStudies as $study)
                        <article class="card-bento card-bento-hover reveal p-5 sm:p-6" data-reveal>
                            <div class="flex flex-wrap items-center gap-2">
                                <h3 class="font-heading text-base font-semibold text-foreground sm:text-lg">
                                    {{ $study['title'] }}
                                </h3>
                                @if (! empty($study['tag']))
                                    <span class="rounded-full border border-primary/15 bg-primary/5 px-2.5 py-0.5 text-xs font-medium text-primary">
                                        {{ $study['tag'] }}
                                    </span>
                                @endif
                            </div>
                            <p class="mt-2 text-sm leading-relaxed text-muted-foreground">
                                {{ $study['summary'] }}
                            </p>
                            @if (! empty($study['result']))
                                <p class="mt-3 border-t border-border pt-3 text-sm font-medium text-foreground">
                                    Hasil: {{ $study['result'] }}
                                </p>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA --}}
    <section class="mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8 lg:pb-20">
        <article class="card-bento reveal overflow-hidden border-primary/20 bg-gradient-to-br from-primary via-primary to-accent text-on-primary" data-reveal>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_60%_80%_at_80%_20%,rgba(255,255,255,0.1),transparent_60%)]" aria-hidden="true"></div>
            <div class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
                <div class="space-y-2">
                    <h2 class="font-heading text-xl font-semibold tracking-tight sm:text-2xl">
                        Cocok butuh bantuan serupa?
                    </h2>
                    <p class="max-w-xl text-sm leading-relaxed text-on-primary/90 sm:text-base">
                        Hubungi lewat WhatsApp, Instagram, atau Discord — bahas kebutuhannya dulu.
                    </p>
                </div>
                <div class="flex shrink-0 flex-col gap-3 sm:flex-row">
                    <a
                        href="{{ route('kontak') }}"
                        class="group inline-flex min-h-10 items-center justify-center gap-2 rounded-lg bg-on-primary px-5 py-2.5 text-sm font-semibold text-primary transition-all duration-200 hover:bg-white hover:shadow-[0_8px_20px_rgba(15,23,42,0.18)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white sm:min-h-11 sm:px-6 sm:py-3"
                    >
                        Halaman kontak
                        <svg aria-hidden="true" class="size-4 transition-transform duration-200 ease-out group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m12 5 7 7-7 7" />
                        </svg>
                    </a>
                    <a
                        href="{{ route('layanan') }}"
                        class="inline-flex min-h-10 items-center justify-center rounded-lg border border-on-primary/30 px-5 py-2.5 text-sm font-semibold text-on-primary transition-all duration-200 hover:bg-white/10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white sm:min-h-11 sm:px-6 sm:py-3"
                    >
                        Lihat layanan
                    </a>
                </div>
            </div>
        </article>
    </section>
</x-layout>
