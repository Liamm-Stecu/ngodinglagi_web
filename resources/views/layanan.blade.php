<x-layout
    :title="'Layanan — LagiNgoding'"
    description="Layanan LagiNgoding: web development, SA-MP/Open.MP, dan VPS/server administration."
>
    <section class="relative overflow-hidden border-b border-border/50">
        <div class="mesh-gradient" aria-hidden="true"></div>
        <div class="grid-pattern" aria-hidden="true"></div>
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="decorative-blob -right-16 -top-20 size-64 bg-secondary/10 sm:size-80"></div>
            <div class="decorative-blob -bottom-24 -left-12 size-48 bg-primary/6" style="animation-delay: 1.8s"></div>
        </div>

        <div class="relative mx-auto w-full max-w-5xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8 lg:py-20">
            <div class="max-w-2xl space-y-4">
                <p class="pill-badge animate-rise-in">Layanan</p>
                <h1 class="animate-rise-in font-heading text-2xl font-semibold leading-tight tracking-tight text-foreground sm:text-4xl lg:text-5xl" style="animation-delay: 70ms">
                    What We Can<br class="hidden sm:block">
                    Do for You
                </h1>
                <p class="animate-rise-in text-[15px] leading-relaxed text-muted-foreground sm:text-lg" style="animation-delay: 140ms">
                    Empat bidang utama: website, server game SA-MP/Open.MP, infrastruktur VPS, dan editing video &amp; foto. Klik salah satu untuk lihat lingkup kerja &amp; harga.
                </p>
            </div>

            <ol class="mt-10 flex flex-wrap gap-2.5 sm:mt-12" aria-label="Alur kerja">
                @foreach ([
                    ['step' => '01', 'title' => 'Diskusi', 'desc' => 'Tentukan lingkup kerja'],
                    ['step' => '02', 'title' => 'Dikerjakan', 'desc' => 'Progres dikabari'],
                    ['step' => '03', 'title' => 'Diserahkan', 'desc' => 'Hasil siap dipakai'],
                ] as $flowIndex => $flow)
                    <li class="animate-rise-in inline-flex items-center gap-2.5 rounded-full border border-border/70 bg-card/70 px-4 py-2 backdrop-blur-sm" style="animation-delay: {{ 200 + $flowIndex * 80 }}ms">
                        <span class="text-xs font-semibold text-primary" aria-hidden="true">{{ $flow['step'] }}</span>
                        <span class="font-heading text-sm font-semibold text-foreground">{{ $flow['title'] }}</span>
                        <span class="hidden text-xs text-muted-foreground sm:inline">· {{ $flow['desc'] }}</span>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    <section class="mx-auto w-full max-w-5xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8" aria-label="Daftar layanan">
        <div class="space-y-3">
            @foreach ($services as $index => $service)
                @php
                    $tiers = data_get($service, 'pricing.tiers', []);
                    $panelId = 'layanan-panel-' . $service['slug'];
                @endphp
                <article
                    class="accordion-item card-bento reveal"
                    data-accordion-item
                    data-reveal="scale"
                    style="transition-delay: {{ $index * 60 }}ms"
                    aria-labelledby="layanan-{{ $service['slug'] }}"
                >
                    <h2 id="layanan-{{ $service['slug'] }}" class="m-0">
                        <button
                            type="button"
                            class="flex w-full items-center gap-4 px-5 py-5 text-left transition-colors duration-200 hover:bg-muted/40 sm:gap-5 sm:px-7 sm:py-6"
                            data-accordion-trigger
                            aria-expanded="false"
                            aria-controls="{{ $panelId }}"
                        >
                            <span class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-primary text-on-primary shadow-[0_4px_12px_rgba(15,118,110,0.2)] sm:size-12 sm:rounded-2xl" aria-hidden="true">
                                @switch($service['slug'])
                                    @case('web')
                                        <svg class="size-5 sm:size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="16 18 22 12 16 6" />
                                            <polyline points="8 6 2 12 8 18" />
                                        </svg>
                                        @break
                                    @case('samp')
                                        <svg class="size-5 sm:size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M6 11h4" />
                                            <path d="M8 9v4" />
                                            <path d="M15 12h.01" />
                                            <path d="M18 10h.01" />
                                            <path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z" />
                                        </svg>
                                        @break
                                    @case('editing')
                                        <svg class="size-5 sm:size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                            <rect width="18" height="18" x="3" y="3" rx="2" />
                                            <path d="M7 3v18" />
                                            <path d="M17 3v18" />
                                            <path d="M3 7.5h4" />
                                            <path d="M3 12h18" />
                                            <path d="M3 16.5h4" />
                                            <path d="M17 7.5h4" />
                                            <path d="M17 16.5h4" />
                                        </svg>
                                        @break
                                    @default
                                        <svg class="size-5 sm:size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                            <rect width="20" height="8" x="2" y="2" rx="2" ry="2" />
                                            <rect width="20" height="8" x="2" y="14" rx="2" ry="2" />
                                            <line x1="6" x2="6.01" y1="6" y2="6" />
                                            <line x1="6" x2="6.01" y1="18" y2="18" />
                                        </svg>
                                @endswitch
                            </span>

                            <span class="min-w-0 flex-1">
                                <span class="flex items-baseline gap-2">
                                    <span class="text-xs font-semibold uppercase tracking-widest text-primary" aria-hidden="true">
                                        {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                    <span class="font-heading text-base font-semibold leading-tight tracking-tight text-foreground sm:text-xl">
                                        {{ $service['title'] }}
                                    </span>
                                </span>
                                <span class="mt-1 block truncate text-sm text-muted-foreground">
                                    {{ $service['short'] }}
                                </span>
                            </span>

                            @if (! empty($tiers[0]['price']))
                                <span class="hidden shrink-0 flex-col items-end sm:flex">
                                    <span class="text-[10px] font-semibold uppercase tracking-wider text-muted-foreground">
                                        {{ data_get($service, 'pricing.label', 'Mulai dari') }}
                                    </span>
                                    <span class="font-heading text-sm font-semibold text-primary">
                                        {{ $tiers[0]['price'] }}
                                    </span>
                                </span>
                            @endif

                            <span class="flex size-8 shrink-0 items-center justify-center rounded-full border border-border/70 bg-muted/50 text-muted-foreground" aria-hidden="true">
                                <svg class="accordion-chevron size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </span>
                        </button>
                    </h2>

                    <div class="accordion-panel" id="{{ $panelId }}" role="region" aria-labelledby="layanan-{{ $service['slug'] }}">
                        <div class="accordion-inner">
                            <div class="space-y-5 border-t border-border/70 px-5 pb-6 pt-5 sm:px-7 sm:pb-7">
                                <p class="max-w-3xl text-sm leading-relaxed text-muted-foreground sm:text-base">
                                    {{ $service['description'] }}
                                </p>

                                <div class="grid gap-5 sm:grid-cols-2 sm:gap-8">
                                    <div class="space-y-3">
                                        <h3 class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                                            Cakupan kerja
                                        </h3>
                                        <ul class="grid gap-2 text-sm text-foreground">
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

                                @if (! empty($tiers))
                                    <div class="rounded-2xl border border-border/70 bg-muted/30 p-4 sm:p-5">
                                        <div class="flex items-baseline gap-2">
                                            <h3 class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                                                {{ data_get($service, 'pricing.label', 'Harga') }}
                                            </h3>
                                            <span class="text-xs text-muted-foreground/70">— bisa nego sesuai lingkup</span>
                                        </div>

                                        <ul class="mt-3 grid gap-2 sm:grid-cols-3 sm:gap-3">
                                            @foreach ($tiers as $tierIndex => $tier)
                                                <li class="animate-rise-in flex flex-col justify-between gap-3 rounded-xl border border-border/80 bg-card px-4 py-3.5" style="animation-delay: {{ 80 + $tierIndex * 70 }}ms">
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

                                        <div class="mt-4">
                                            <a
                                                href="{{ \App\Support\WaLink::make(config('contact.whatsapp.url'), 'Halo LagiNgoding, saya ingin tanya layanan '.$service['title'].'.') }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="btn-primary"
                                            >
                                                Tanya layanan ini
                                                <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14" />
                                                    <path d="m12 5 7 7-7 7" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mx-auto w-full max-w-5xl px-4 pb-8 sm:px-6 sm:pb-14 lg:px-8 lg:pb-20">
        <article class="card-bento reveal overflow-hidden border-primary/20 bg-gradient-to-br from-primary via-primary to-accent text-on-primary" data-reveal>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_60%_80%_at_80%_20%,rgba(255,255,255,0.1),transparent_60%)]" aria-hidden="true"></div>
            <div class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
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
                        class="group inline-flex min-h-10 items-center justify-center gap-2 rounded-lg bg-on-primary px-5 py-2.5 text-sm font-semibold text-primary transition-all duration-200 hover:bg-white hover:shadow-[0_8px_20px_rgba(15,23,42,0.18)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white sm:min-h-11 sm:px-6 sm:py-3"
                    >
                        Hubungi saya
                        <svg aria-hidden="true" class="size-4 transition-transform duration-200 ease-out group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m12 5 7 7-7 7" />
                        </svg>
                    </a>
                    <a
                        href="{{ route('about') }}"
                        class="inline-flex min-h-10 items-center justify-center rounded-lg border border-on-primary/30 px-5 py-2.5 text-sm font-semibold text-on-primary transition-all duration-200 hover:bg-white/10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white sm:min-h-11 sm:px-6 sm:py-3"
                    >
                        Tentang kami
                    </a>
                </div>
            </div>
        </article>
    </section>

    @php $faq = config('content.faq', []); @endphp
    @if (! empty($faq))
        <section class="border-t border-border/60 bg-muted/30" aria-labelledby="faq-heading">
            <div class="mx-auto w-full max-w-5xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8 lg:py-16">
                <div class="grid gap-8 lg:grid-cols-[minmax(0,4fr)_minmax(0,7fr)] lg:gap-14">
                    <div class="space-y-4">
                        <p class="pill-badge">FAQ</p>
                        <h2 id="faq-heading" class="font-heading text-xl font-semibold tracking-tight text-foreground sm:text-3xl">
                            Pertanyaan yang sering muncul
                        </h2>
                        <p class="text-sm leading-relaxed text-muted-foreground">
                            Belum terjawab di sini? Tanya langsung lewat WhatsApp — dibalas secepatnya.
                        </p>
                        <a href="{{ route('kontak') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary transition hover:gap-2.5">
                            Ke halaman kontak
                            <svg class="size-4" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14" />
                                <path d="m12 5 7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    <div class="space-y-2.5">
                        @foreach ($faq as $faqIndex => $item)
                            <div
                                class="accordion-item reveal rounded-2xl border border-border/60 bg-card/80 backdrop-blur-sm transition-shadow duration-200 has-[.is-open]:shadow-card"
                                data-accordion-item
                                data-reveal
                                style="transition-delay: {{ $faqIndex * 50 }}ms"
                            >
                                <h3 class="m-0">
                                    <button
                                        type="button"
                                        class="flex w-full items-center gap-3 px-4 py-4 text-left text-sm font-semibold text-foreground transition-colors duration-200 hover:bg-muted/40 sm:px-5 sm:text-base"
                                        data-accordion-trigger
                                        aria-expanded="false"
                                        aria-controls="faq-panel-{{ $faqIndex }}"
                                    >
                                        <span class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-[11px] font-bold text-primary" aria-hidden="true">
                                            {{ $faqIndex + 1 }}
                                        </span>
                                        <span class="flex-1">{{ $item['question'] }}</span>
                                        <span class="flex size-7 shrink-0 items-center justify-center rounded-full border border-border/70 bg-muted/50 text-muted-foreground" aria-hidden="true">
                                            <svg class="accordion-chevron size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m6 9 6 6 6-6" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <div class="accordion-panel" id="faq-panel-{{ $faqIndex }}" role="region">
                                    <div class="accordion-inner">
                                        <p class="border-l-2 border-primary/30 px-4 pb-4 pl-6 text-sm leading-relaxed text-muted-foreground sm:px-5 sm:pl-7">
                                            {{ $item['answer'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
</x-layout>
