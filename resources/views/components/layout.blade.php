<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @php
            $pageTitle = $title ?? 'LagiNgoding — Jasa Web, SA-MP/Open.MP & VPS';
            $pageDescription = $description ?? 'Jasa web development, SA-MP/Open.MP development, dan VPS/server administration. Komunikasi jelas, hasil siap dipakai.';
            $canonicalUrl = url()->current();
        @endphp

        <title>{{ $pageTitle }}</title>
        <meta name="description" content="{{ $pageDescription }}">
        <link rel="canonical" href="{{ $canonicalUrl }}">

        <meta property="og:type" content="website">
        <meta property="og:site_name" content="LagiNgoding">
        <meta property="og:locale" content="id_ID">
        <meta property="og:title" content="{{ $pageTitle }}">
        <meta property="og:description" content="{{ $pageDescription }}">
        <meta property="og:url" content="{{ $canonicalUrl }}">

        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="{{ $pageTitle }}">
        <meta name="twitter:description" content="{{ $pageDescription }}">

        <link rel="icon" type="image/svg+xml" href="/favicon.svg">
        <link rel="icon" href="/favicon.ico" sizes="32x32">
        <link rel="apple-touch-icon" href="/favicon.svg">
        <meta name="theme-color" content="#0F766E">

        @if (config('app.analytics_url'))
            <script defer data-domain="{{ parse_url(config('app.analytics_url'), PHP_URL_HOST) }}" src="https://plausible.io/js/script.js"></script>
        @endif

        <script>
            (function () {
                try {
                    var t = localStorage.getItem('theme');
                    if (t === 'dark' || (!t && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                        document.documentElement.classList.add('dark');
                    }
                } catch (e) {}
            })();
        </script>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script type="application/ld+json">{!! json_encode([
            '@@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'LagiNgoding',
            'description' => 'Jasa web development, SA-MP/Open.MP development, dan VPS/server administration.',
            'url' => route('home'),
            'telephone' => config('contact.whatsapp.display'),
            'areaServed' => 'ID',
            'sameAs' => array_values(array_filter([
                config('contact.instagram.url'),
            ])),
            'makesOffer' => collect(config('services.services'))->map(fn ($service) => [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => $service['title'],
                    'description' => $service['short'] ?? '',
                ],
            ])->values()->all(),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

        <noscript>
            <style>
                [data-reveal] {
                    opacity: 1 !important;
                    transform: none !important;
                }
            </style>
        </noscript>
    </head>

    <body class="min-h-screen bg-background font-sans text-foreground antialiased">
        <a
            href="#konten"
            class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-lg focus:bg-primary focus:px-4 focus:py-3 focus:text-sm focus:font-semibold focus:text-on-primary"
        >
            Lewati ke konten utama
        </a>

        <header data-header class="header-bar fixed left-0 right-0 top-0 z-40 px-3 pt-3 sm:px-6 sm:pt-4">
            <div class="mx-auto flex w-full max-w-5xl items-center justify-between gap-2 rounded-2xl border border-border/60 bg-background/80 px-3 py-2 shadow-card backdrop-blur-xl sm:gap-3 sm:rounded-full sm:px-5 sm:py-2.5">
                <a
                    href="{{ route('home') }}"
                    class="group flex items-center gap-2.5 text-foreground transition-colors duration-200 hover:text-primary"
                >
                    <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-primary to-accent text-on-primary shadow-[0_2px_8px_rgba(15,118,110,0.3)] sm:size-9" aria-hidden="true">
                        <svg class="size-[58%]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 6 5 12l6 6" />
                            <path d="m14 5 5 14" />
                        </svg>
                    </span>
                    <span class="font-heading text-base font-semibold tracking-tight sm:text-lg">
                        <span class="relative">
                            LagiNgoding
                            <span
                                class="absolute -bottom-0.5 left-0 h-0.5 w-0 rounded-full bg-primary transition-all duration-300 ease-out group-hover:w-full"
                                aria-hidden="true"
                            ></span>
                        </span>
                    </span>
                </a>

                <div class="flex items-center gap-1 sm:gap-1.5">
                    <nav aria-label="Navigasi utama" class="hidden min-w-0 sm:block">
                        <ul class="flex items-center gap-0.5 sm:gap-1">
                        <li>
                            <a
                                href="{{ route('home') }}"
                                @class([
                                    'group inline-flex min-h-9 items-center rounded-full px-2.5 text-sm font-medium transition-all duration-200 focus-visible:text-foreground sm:min-h-10 sm:px-3.5',
                                    'bg-primary/10 text-primary' => request()->routeIs('home'),
                                    'text-muted-foreground hover:bg-muted hover:text-foreground' => ! request()->routeIs('home'),
                                ])
                            >
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('layanan') }}"
                                @class([
                                    'group inline-flex min-h-9 items-center rounded-full px-2.5 text-sm font-medium transition-all duration-200 focus-visible:text-foreground sm:min-h-10 sm:px-3.5',
                                    'bg-primary/10 text-primary' => request()->routeIs('layanan'),
                                    'text-muted-foreground hover:bg-muted hover:text-foreground' => ! request()->routeIs('layanan'),
                                ])
                            >
                                Layanan
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('about') }}"
                                @class([
                                    'group inline-flex min-h-9 items-center rounded-full px-2.5 text-sm font-medium transition-all duration-200 focus-visible:text-foreground sm:min-h-10 sm:px-3.5',
                                    'bg-primary/10 text-primary' => request()->routeIs('about'),
                                    'text-muted-foreground hover:bg-muted hover:text-foreground' => ! request()->routeIs('about'),
                                ])
                            >
                                Tentang
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('kontak') }}"
                                @class([
                                    'group inline-flex min-h-9 items-center gap-1.5 rounded-full px-3 text-sm font-semibold shadow-[0_2px_8px_rgba(15,118,110,0.25)] transition-all duration-200 hover:-translate-y-0.5 sm:min-h-10 sm:px-4',
                                    'bg-primary text-on-primary hover:bg-accent hover:shadow-[0_4px_16px_rgba(15,118,110,0.35)]' => ! request()->routeIs('kontak'),
                                    'bg-foreground text-background' => request()->routeIs('kontak'),
                                ])
                            >
                                Kontak
                                <svg aria-hidden="true" class="hidden size-3.5 transition-transform duration-200 ease-out group-hover:translate-x-0.5 sm:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14" />
                                    <path d="m12 5 7 7-7 7" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>

                <button
                    type="button"
                    data-theme-toggle
                    class="inline-flex size-8 shrink-0 cursor-pointer items-center justify-center rounded-full text-muted-foreground transition-all duration-200 hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ring sm:size-9"
                    aria-label="Ganti tema terang atau gelap"
                >
                    <svg class="size-4 dark:hidden" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                    </svg>
                    <svg class="hidden size-4 dark:block" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="4" />
                        <path d="M12 2v2" />
                        <path d="M12 20v2" />
                        <path d="m4.93 4.93 1.41 1.41" />
                        <path d="m17.66 17.66 1.41 1.41" />
                        <path d="M2 12h2" />
                        <path d="M20 12h2" />
                        <path d="m6.34 17.66-1.41 1.41" />
                        <path d="m19.07 4.93-1.41 1.41" />
                    </svg>
                </button>

                <button
                    type="button"
                    data-nav-toggle
                    aria-expanded="false"
                    aria-controls="mobile-nav"
                    aria-label="Buka menu navigasi"
                    class="inline-flex size-8 shrink-0 cursor-pointer items-center justify-center rounded-full text-muted-foreground transition-all duration-200 hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ring sm:hidden"
                >
                    <svg data-nav-icon="open" class="size-4" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" x2="20" y1="6" y2="6" />
                        <line x1="4" x2="20" y1="12" y2="12" />
                        <line x1="4" x2="20" y1="18" y2="18" />
                    </svg>
                    <svg data-nav-icon="close" class="hidden size-4" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
                </div>
            </div>

            <div
                id="mobile-nav"
                data-nav-panel
                class="mx-auto mt-2 hidden w-full max-w-5xl overflow-hidden rounded-2xl border border-border/60 bg-background/95 shadow-card backdrop-blur-xl sm:hidden"
            >
                <nav aria-label="Navigasi mobile" class="p-2">
                    <ul class="grid gap-1">
                        <li>
                            <a
                                href="{{ route('home') }}"
                                @class([
                                    'flex min-h-11 items-center rounded-xl px-3.5 text-sm font-medium transition-colors duration-200',
                                    'bg-primary/10 text-primary' => request()->routeIs('home'),
                                    'text-foreground hover:bg-muted' => ! request()->routeIs('home'),
                                ])
                            >
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('layanan') }}"
                                @class([
                                    'flex min-h-11 items-center rounded-xl px-3.5 text-sm font-medium transition-colors duration-200',
                                    'bg-primary/10 text-primary' => request()->routeIs('layanan'),
                                    'text-foreground hover:bg-muted' => ! request()->routeIs('layanan'),
                                ])
                            >
                                Layanan
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('about') }}"
                                @class([
                                    'flex min-h-11 items-center rounded-xl px-3.5 text-sm font-medium transition-colors duration-200',
                                    'bg-primary/10 text-primary' => request()->routeIs('about'),
                                    'text-foreground hover:bg-muted' => ! request()->routeIs('about'),
                                ])
                            >
                                Tentang
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('kontak') }}"
                                @class([
                                    'flex min-h-11 items-center justify-center rounded-xl px-3.5 text-sm font-semibold transition-colors duration-200',
                                    'bg-primary text-on-primary hover:bg-accent' => ! request()->routeIs('kontak'),
                                    'bg-foreground text-background' => request()->routeIs('kontak'),
                                ])
                            >
                                Kontak
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <main id="konten" class="pt-20 sm:pt-22">
            {{ $slot }}
        </main>

        <footer class="section-divider">
            <div class="mx-auto w-full max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4 lg:gap-12">
                    <div class="space-y-3">
                        <div class="flex items-center gap-2.5">
                            <span class="inline-flex size-9 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-primary to-accent text-on-primary shadow-[0_2px_8px_rgba(15,118,110,0.3)]" aria-hidden="true">
                                <svg class="size-[58%]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 6 5 12l6 6" />
                                    <path d="m14 5 5 14" />
                                </svg>
                            </span>
                            <p class="font-heading text-base font-semibold text-foreground">LagiNgoding</p>
                        </div>
                        <p class="max-w-xs text-sm leading-relaxed text-muted-foreground">
                            Bantuan teknis untuk website, SA-MP/Open.MP, dan VPS — komunikasi jelas, hasil siap dipakai.
                        </p>
                    </div>

                    <div class="space-y-3">
                        <p class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">Layanan</p>
                        <ul class="space-y-1.5">
                            <li>
                                <a href="{{ route('layanan') }}" class="inline-flex min-h-8 items-center text-sm text-muted-foreground transition-colors duration-200 hover:text-foreground">
                                    Build Website
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('layanan') }}" class="inline-flex min-h-8 items-center text-sm text-muted-foreground transition-colors duration-200 hover:text-foreground">
                                    SA-MP / Open.MP
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('layanan') }}" class="inline-flex min-h-8 items-center text-sm text-muted-foreground transition-colors duration-200 hover:text-foreground">
                                    VPS Administrator
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('layanan') }}" class="inline-flex min-h-8 items-center text-sm text-muted-foreground transition-colors duration-200 hover:text-foreground">
                                    Video &amp; Photo Editing
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="space-y-3">
                        <p class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">Perusahaan</p>
                        <ul class="space-y-1.5">
                            <li>
                                <a href="{{ route('about') }}" class="inline-flex min-h-8 items-center text-sm text-muted-foreground transition-colors duration-200 hover:text-foreground">
                                    Tentang
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kontak') }}" class="inline-flex min-h-8 items-center text-sm text-muted-foreground transition-colors duration-200 hover:text-foreground">
                                    Kontak
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('changelog') }}" class="inline-flex min-h-8 items-center text-sm text-muted-foreground transition-colors duration-200 hover:text-foreground">
                                    Changelog
                                </a>
                            </li>
                            <li>
                                <a href="{{ config('products.affiliate_url') }}" target="_blank" rel="noopener noreferrer sponsored" class="inline-flex min-h-8 items-center text-sm text-muted-foreground transition-colors duration-200 hover:text-foreground">
                                    Wide Host Media
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="space-y-3">
                        <p class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">Legal</p>
                        <ul class="space-y-1.5">
                            <li>
                                <a href="{{ route('privacy') }}" class="inline-flex min-h-8 items-center text-sm text-muted-foreground transition-colors duration-200 hover:text-foreground">
                                    Kebijakan Privasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('terms') }}" class="inline-flex min-h-8 items-center text-sm text-muted-foreground transition-colors duration-200 hover:text-foreground">
                                    Syarat &amp; Ketentuan
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-10 flex flex-col items-center justify-between gap-3 border-t border-border/60 pt-6 sm:flex-row">
                    <p class="text-sm text-muted-foreground/80">&copy; {{ date('Y') }} LagiNgoding. Semua hak dilindungi.</p>
                    <p class="text-sm text-muted-foreground/60">Dibuat dengan <span class="text-primary" aria-hidden="true">♥</span> di Indonesia</p>
                </div>
            </div>
        </footer>

        @include('components.floating-wa')
    </body>
</html>
