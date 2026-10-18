<x-layout
    :title="'Portofolio — ngodinglagi'"
    description="Ringkasan pengalaman kerja ngodinglagi: SA-MP/Open.MP, website, dan VPS/server."
>
    {{-- Header --}}
    <section class="relative overflow-hidden border-b border-border/60">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="decorative-blob -right-16 -top-20 size-64 bg-secondary/12 sm:size-80"></div>
        </div>

        <div class="relative mx-auto w-full max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
            <div class="animate-rise-in max-w-2xl space-y-4">
                <p class="inline-flex items-center gap-2 rounded-full border border-primary/15 bg-primary/5 px-3 py-1 text-xs font-semibold uppercase tracking-[0.14em] text-primary">
                    Portofolio
                </p>
                <h1 class="font-heading text-3xl font-semibold leading-tight tracking-tight text-foreground sm:text-4xl lg:text-5xl">
                    Pengalaman kerja
                </h1>
                <p class="text-base leading-relaxed text-muted-foreground sm:text-lg">
                    Fokus di tiga bidang — server game, website, dan infrastruktur. Total
                    <span class="font-semibold text-foreground">{{ $stats['samp'] }}</span> proyek SA-MP dan
                    <span class="font-semibold text-foreground">{{ $stats['web'] }}</span> proyek website selesai.
                </p>
            </div>

            <div class="animate-rise-in mt-8 grid gap-3 sm:grid-cols-2 sm:gap-4" style="animation-delay: 100ms">
                <div class="card-bento flex items-end justify-between gap-4 p-5 sm:p-6" aria-label="Total proyek SA-MP">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">SA-MP / Open.MP</p>
                        <p class="mt-1 font-heading text-4xl font-semibold tracking-tight text-foreground sm:text-5xl" data-count-to="{{ $stats['samp'] }}">
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

                <div class="card-bento flex items-end justify-between gap-4 p-5 sm:p-6" aria-label="Total proyek website">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">Website</p>
                        <p class="mt-1 font-heading text-4xl font-semibold tracking-tight text-foreground sm:text-5xl" data-count-to="{{ $stats['web'] }}">
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

    {{-- Kategori --}}
    <section class="mx-auto w-full max-w-6xl space-y-4 px-4 py-12 sm:space-y-5 sm:px-6 sm:py-16 lg:px-8">
        @foreach ($categories as $index => $category)
            <article
                class="card-bento card-bento-hover card-accent-top reveal flex flex-col gap-5 p-6 sm:p-8"
                data-reveal
                style="transition-delay: {{ $index * 60 }}ms"
                aria-labelledby="kategori-{{ $category['slug'] }}"
            >
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                    <div class="max-w-2xl space-y-2">
                        <h2 id="kategori-{{ $category['slug'] }}" class="font-heading text-xl font-semibold tracking-tight text-foreground sm:text-2xl">
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

    {{-- CTA --}}
    <section class="mx-auto w-full max-w-6xl px-4 pb-16 sm:px-6 sm:pb-20 lg:px-8">
        <article class="card-bento reveal border-primary/20 bg-primary text-on-primary" data-reveal>
            <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
                <div class="space-y-2">
                    <h2 class="font-heading text-xl font-semibold tracking-tight sm:text-2xl">
                        Butuh bantuan serupa?
                    </h2>
                    <p class="max-w-xl text-sm leading-relaxed text-on-primary/90 sm:text-base">
                        Hubungi lewat WhatsApp, Instagram, atau Discord.
                    </p>
                </div>
                <div class="flex shrink-0 flex-col gap-3 sm:flex-row">
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
        </article>
    </section>
</x-layout>
