<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'ngodinglagi' }}</title>
        <meta name="description" content="{{ $description ?? 'Jasa web development, SA-MP/Open.MP development, dan VPS/server administration.' }}">

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])

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

        <header data-header class="header-bar sticky top-0 z-40 border-b border-border/60 bg-background/85 backdrop-blur-md">
            <div class="mx-auto flex w-full max-w-6xl items-center justify-between gap-3 px-4 py-4 sm:px-6 lg:px-8">
                <a
                    href="{{ route('home') }}"
                    class="group flex items-center gap-2.5 text-foreground transition-colors duration-200 hover:text-primary"
                >
                    <span class="inline-flex size-9 shrink-0 items-center justify-center rounded-xl bg-primary text-on-primary shadow-sm" aria-hidden="true">
                        <svg class="size-[58%]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 6 5 12l6 6" />
                            <path d="m14 5 5 14" />
                        </svg>
                    </span>
                    <span class="font-heading text-lg font-semibold tracking-tight">
                        <span class="relative">
                            ngodinglagi
                            <span
                                class="absolute -bottom-0.5 left-0 h-0.5 w-0 rounded-full bg-primary transition-all duration-300 ease-out group-hover:w-full"
                                aria-hidden="true"
                            ></span>
                        </span>
                    </span>
                </a>

                <nav aria-label="Navigasi utama" class="min-w-0">
                    <ul class="flex items-center gap-0.5 sm:gap-2">
                        <li>
                            <a
                                href="{{ route('home') }}"
                                @class([
                                    'group nav-link inline-flex min-h-11 items-center rounded-lg px-2.5 text-sm font-medium transition-colors duration-200 focus-visible:text-foreground sm:px-3',
                                    'bg-muted text-foreground' => request()->routeIs('home'),
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
                                    'group nav-link inline-flex min-h-11 items-center rounded-lg px-2.5 text-sm font-medium transition-colors duration-200 focus-visible:text-foreground sm:px-3',
                                    'bg-muted text-foreground' => request()->routeIs('layanan'),
                                    'text-muted-foreground hover:bg-muted hover:text-foreground' => ! request()->routeIs('layanan'),
                                ])
                            >
                                Layanan
                            </a>
                        </li>
                        <li class="hidden sm:block">
                            <a
                                href="{{ route('portofolio') }}"
                                @class([
                                    'group nav-link inline-flex min-h-11 items-center rounded-lg px-2.5 text-sm font-medium transition-colors duration-200 focus-visible:text-foreground sm:px-3',
                                    'bg-muted text-foreground' => request()->routeIs('portofolio'),
                                    'text-muted-foreground hover:bg-muted hover:text-foreground' => ! request()->routeIs('portofolio'),
                                ])
                            >
                                Portofolio
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('kontak') }}"
                                @class([
                                    'group inline-flex min-h-11 items-center gap-1.5 rounded-lg px-3.5 text-sm font-semibold shadow-[0_1px_2px_rgba(15,118,110,0.3)] transition-all duration-200 sm:px-4',
                                    'bg-primary text-on-primary hover:bg-primary/90 hover:shadow-[0_6px_16px_rgba(15,118,110,0.28)]' => ! request()->routeIs('kontak'),
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
            </div>
        </header>

        <main id="konten">
            {{ $slot }}
        </main>

        <footer class="border-t border-border">
            <div class="mx-auto flex w-full max-w-6xl flex-col gap-4 px-4 py-8 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
                <div class="space-y-1">
                    <div class="flex items-center gap-2.5">
                        <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-primary text-on-primary" aria-hidden="true">
                            <svg class="size-[58%]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 6 5 12l6 6" />
                                <path d="m14 5 5 14" />
                            </svg>
                        </span>
                        <p class="font-heading text-sm font-semibold text-foreground">ngodinglagi</p>
                    </div>
                    <p class="pl-[2.25rem] text-sm text-muted-foreground">
                        Web · SA-MP/Open.MP · VPS
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-1 text-sm text-muted-foreground">
                    <a
                        href="{{ route('layanan') }}"
                        class="inline-flex min-h-10 items-center rounded-lg px-3 transition-colors duration-200 hover:bg-muted hover:text-foreground"
                    >
                        Layanan
                    </a>
                    <a
                        href="{{ route('portofolio') }}"
                        class="inline-flex min-h-10 items-center rounded-lg px-3 transition-colors duration-200 hover:bg-muted hover:text-foreground"
                    >
                        Portofolio
                    </a>
                    <a
                        href="{{ route('kontak') }}"
                        class="inline-flex min-h-10 items-center rounded-lg px-3 transition-colors duration-200 hover:bg-muted hover:text-foreground"
                    >
                        Kontak
                    </a>
                    <a
                        href="{{ config('products.affiliate_url') }}"
                        target="_blank"
                        rel="noopener noreferrer sponsored"
                        class="inline-flex min-h-10 items-center rounded-lg px-3 transition-colors duration-200 hover:bg-muted hover:text-foreground"
                    >
                        Wide Host Media
                    </a>
                </div>

                <p class="text-sm text-muted-foreground/80">&copy; {{ date('Y') }} ngodinglagi</p>
            </div>
        </footer>
    </body>
</html>
