<x-layout
    :title="'Layanan — ngodinglagi'"
    description="Layanan ngodinglagi: web development, SA-MP/Open.MP, dan VPS/server administration."
>
    <section class="relative overflow-hidden border-b border-border/60">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="decorative-blob -right-16 -top-20 size-64 bg-secondary/12 sm:size-80"></div>
            <div class="decorative-blob -bottom-24 -left-12 size-48 bg-primary/8" style="animation-delay: 1.8s"></div>
        </div>

        <div class="relative mx-auto w-full max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
            <div class="animate-rise-in max-w-2xl space-y-4">
                <p class="inline-flex items-center gap-2 rounded-full border border-primary/15 bg-primary/5 px-3 py-1 text-xs font-semibold uppercase tracking-[0.14em] text-primary">
                    Layanan
                </p>
                <h1 class="font-heading text-3xl font-semibold leading-tight tracking-tight text-foreground sm:text-4xl lg:text-5xl">
                    Apa yang bisa<br class="hidden sm:block">
                    dikerjakan
                </h1>
                <p class="text-base leading-relaxed text-muted-foreground sm:text-lg">
                    Tiga bidang utama: website, server game SA-MP/Open.MP, dan infrastruktur VPS. Lingkup kerja disepakati di awal.
                </p>
            </div>

            <ol class="animate-rise-in mt-10 grid gap-3 sm:mt-12 sm:grid-cols-3 sm:gap-4" style="animation-delay: 120ms" aria-label="Alur kerja">
                @foreach ([
                    ['step' => '01', 'title' => 'Diskusi', 'desc' => 'Ceritakan kebutuhan, kita tentukan lingkupnya.'],
                    ['step' => '02', 'title' => 'Dikerjakan', 'desc' => 'Progres dikabari tanpa perlu ditanya terus.'],
                    ['step' => '03', 'title' => 'Diserahkan', 'desc' => 'Hasil siap dipakai, dibantu kalau ada kendala.'],
                ] as $flow)
                    <li class="flex items-start gap-3 rounded-2xl border border-border/70 bg-card/70 px-4 py-4 backdrop-blur-sm sm:px-5">
                        <span class="font-heading text-sm font-semibold text-primary" aria-hidden="true">{{ $flow['step'] }}</span>
                        <div>
                            <p class="font-heading text-sm font-semibold text-foreground">{{ $flow['title'] }}</p>
                            <p class="mt-0.5 text-xs leading-relaxed text-muted-foreground sm:text-sm">{{ $flow['desc'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    <section class="mx-auto w-full max-w-6xl space-y-4 px-4 py-12 sm:space-y-5 sm:px-6 sm:py-16 lg:px-8">
        @foreach ($services as $index => $service)
            <article
                class="card-bento card-bento-hover card-accent-top reveal overflow-hidden"
                data-reveal
                style="transition-delay: {{ $index * 60 }}ms"
                aria-labelledby="layanan-{{ $service['slug'] }}"
            >
                <div class="flex flex-col gap-6 p-6 sm:p-8">
                    <header class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-4">
                            <span class="flex size-12 shrink-0 items-center justify-center rounded-2xl bg-primary text-on-primary shadow-[0_4px_12px_rgba(15,118,110,0.2)]" aria-hidden="true">
                                @switch($service['slug'])
                                    @case('web')
                                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="16 18 22 12 16 6" />
                                            <polyline points="8 6 2 12 8 18" />
                                        </svg>
                                        @break
                                    @case('samp')
                                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M6 11h4" />
                                            <path d="M8 9v4" />
                                            <path d="M15 12h.01" />
                                            <path d="M18 10h.01" />
                                            <path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z" />
                                        </svg>
                                        @break
                                    @default
                                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                            <rect width="20" height="8" x="2" y="2" rx="2" ry="2" />
                                            <rect width="20" height="8" x="2" y="14" rx="2" ry="2" />
                                            <line x1="6" x2="6.01" y1="6" y2="6" />
                                            <line x1="6" x2="6.01" y1="18" y2="18" />
                                        </svg>
                                @endswitch
                            </span>
                            <div class="space-y-1.5 pt-0.5">
                                <p class="font-heading text-xs font-semibold uppercase tracking-widest text-primary" aria-hidden="true">
                                    {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                                </p>
                                <h2 id="layanan-{{ $service['slug'] }}" class="font-heading text-xl font-semibold leading-tight tracking-tight text-foreground sm:text-2xl">
                                    {{ $service['title'] }}
                                </h2>
                                <p class="max-w-md text-sm leading-relaxed text-muted-foreground">
                                    {{ $service['short'] }}
                                </p>
                            </div>
                        </div>
                    </header>

                    <p class="max-w-3xl border-t border-border/70 pt-5 text-sm leading-relaxed text-muted-foreground sm:text-base">
                        {{ $service['description'] }}
                    </p>

                    <div class="grid gap-6 border-t border-border/70 pt-5 sm:grid-cols-2 sm:gap-8">
                        <div class="space-y-3">
                            <h3 class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                                Cakupan kerja
                            </h3>
                            <ul class="grid gap-2 text-sm text-foreground sm:grid-cols-2 sm:gap-x-4">
                                @foreach ($service['items'] as $item)
                                    <li class="flex items-start gap-2.5">
                                        <svg class="mt-0.5 size-4 shrink-0 text-primary" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="space-y-3">
                            <h3 class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                                Cocok untuk
                            </h3>
                            <ul class="flex flex-wrap gap-2">
                                @foreach ($service['for'] as $fit)
                                    <li class="inline-flex items-center rounded-full border border-primary/15 bg-primary/5 px-3 py-1.5 text-xs font-medium text-primary sm:text-sm">
                                        {{ $fit }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    @if (! empty($service['pricing']['tiers']))
                        <div class="border-t border-border/70 pt-5">
                            <div class="flex items-baseline gap-2">
                                <h3 class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                                    {{ $service['pricing']['label'] ?? 'Harga' }}
                                </h3>
                                <span class="text-xs text-muted-foreground/70">— bisa nego sesuai lingkup</span>
                            </div>

                            <ul class="mt-3 grid gap-2 sm:grid-cols-3 sm:gap-3">
                                @foreach ($service['pricing']['tiers'] as $tier)
                                    <li class="flex flex-col justify-between gap-3 rounded-xl border border-border/80 bg-muted/40 px-4 py-3.5">
                                        <div class="space-y-1">
                                            <p class="text-sm font-medium text-foreground">{{ $tier['name'] }}</p>
                                            <p class="text-xs leading-relaxed text-muted-foreground">{{ $tier['note'] }}</p>
                                        </div>
                                        <p class="font-heading text-base font-semibold tracking-tight text-primary sm:text-lg">
                                            {{ $tier['price'] }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </article>
        @endforeach
    </section>

    <section class="mx-auto w-full max-w-6xl px-4 pb-16 sm:px-6 sm:pb-20 lg:px-8">
        <article class="card-bento reveal border-primary/20 bg-primary text-on-primary" data-reveal>
            <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
                <div class="space-y-2">
                    <h2 class="font-heading text-xl font-semibold tracking-tight sm:text-2xl">
                        Ada yang mau dikerjakan?
                    </h2>
                    <p class="max-w-xl text-sm leading-relaxed text-on-primary/90 sm:text-base">
                        Ceritakan kebutuhannya — kita bahas lingkup kerja yang jelas sebelum mulai.
                    </p>
                </div>
                <div class="flex shrink-0 flex-col gap-3 sm:flex-row">
                    <a
                        href="{{ route('kontak') }}"
                        class="group inline-flex min-h-11 items-center justify-center gap-2 rounded-lg bg-on-primary px-6 py-3 text-sm font-semibold text-primary transition-all duration-200 hover:bg-white hover:shadow-[0_8px_20px_rgba(15,23,42,0.18)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                    >
                        Hubungi saya
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
