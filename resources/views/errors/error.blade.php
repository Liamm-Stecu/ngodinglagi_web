@php
    $code = $code ?? 404;
    $title = $title ?? 'Halaman tidak ditemukan';
    $message = $message ?? 'Halaman yang kamu tuju tidak ada atau sudah dipindahkan. Mungkin sedang dalam konstruksi.';
    $cta = $cta ?? ['label' => 'Kembali ke beranda', 'href' => route('home')];
    $variant = $variant ?? 'error';
    $isMaintenance = $variant === 'maintenance';
@endphp

<x-error-shell :title="$title">
    <main class="relative flex min-h-screen w-full flex-col items-center justify-center overflow-hidden px-4 py-12">
        @if ($isMaintenance)
            <div class="pointer-events-none absolute inset-0" aria-hidden="true">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_65%_50%_at_50%_-10%,#14b8a61f,transparent_70%)]"></div>
            </div>
        @else
            <div class="pointer-events-none absolute inset-0" aria-hidden="true">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_55%_45%_at_50%_50%,#0f766e14,transparent_75%)]"></div>
            </div>
            <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
                @foreach ([['8%', '18%', '0s', 'size-14'], ['86%', '24%', '0.8s', 'size-10'], ['14%', '78%', '1.4s', 'size-10'], ['88%', '72%', '0.4s', 'size-14']] as [$left, $top, $delay, $size])
                    <svg class="error-drift absolute {{ $size }} text-primary/12" style="left: {{ $left }}; top: {{ $top }}; animation-delay: {{ $delay }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12a9 9 0 1 1-9-9c2.5 0 4.8 1 6.5 2.6" />
                        <path d="M21 3v6h-6" />
                    </svg>
                @endforeach
            </div>
        @endif

        <div class="relative z-10 flex w-full max-w-md flex-col items-center text-center">
            <div class="relative mb-6 {{ $isMaintenance ? 'float-soft' : '' }}" aria-hidden="true">
                <div class="flex size-28 items-center justify-center rounded-3xl border border-border bg-card shadow-card">
                    @if ($isMaintenance)
                        <svg class="size-14 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <g class="build-gear">
                                <path d="M12 4.5 13.6 6l2.1-.3 1 1.9 1.9 1-.3 2.1L19.8 12l-1.5 1.5.3 2.1-1.9 1-1 1.9-2.1-.3L12 19.5 10.4 18l-2.1.3-1-1.9-1.9-1 .3-2.1L4.2 12l1.5-1.5-.3-2.1 1.9-1 1-1.9 2.1.3L12 4.5Z" />
                                <circle cx="12" cy="12" r="3" />
                            </g>
                        </svg>
                    @else
                        <svg class="size-14 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.7 6.3a4.5 4.5 0 0 0-6 6L4 17v3h3l4.7-4.7a4.5 4.5 0 0 0 6-6L15 12l-3-3 2.7-2.7Z" />
                        </svg>
                    @endif
                </div>

                @if ($isMaintenance)
                    <span class="absolute -right-3 -top-2 rounded-full border border-primary/20 bg-primary/10 px-2.5 py-1 font-heading text-xs font-semibold text-primary">
                        {{ $code }}
                    </span>
                @else
                    <span class="error-ring absolute -inset-2 rounded-[1.6rem] border-2 border-dashed border-primary/35" aria-hidden="true"></span>
                    <span class="absolute -right-3 -top-2 rounded-full border border-primary/20 bg-primary/10 px-2.5 py-1 font-heading text-xs font-semibold text-primary">
                        {{ $code }}
                    </span>
                @endif
            </div>

            @if ($isMaintenance)
                <p class="build-progress mb-7 h-1.5 w-44 max-w-full" aria-hidden="true"></p>
            @else
                <p class="error-retry mb-7 inline-flex items-center gap-1.5 text-xs font-medium uppercase tracking-[0.14em] text-muted-foreground" aria-hidden="true">
                    mencoba menyambung ulang
                    <span class="error-dot"></span>
                    <span class="error-dot" style="animation-delay: 0.2s"></span>
                    <span class="error-dot" style="animation-delay: 0.4s"></span>
                </p>
            @endif

            <h1 class="font-heading text-2xl font-semibold tracking-tight text-foreground sm:text-3xl">
                {{ $title }}
            </h1>

            <p class="mt-3 max-w-sm text-sm leading-relaxed text-muted-foreground sm:text-base">
                {{ $message }}
            </p>

            <div class="mt-8 flex flex-col items-center gap-3 sm:flex-row">
                <a href="{{ $cta['href'] }}" class="btn-primary">
                    {{ $cta['label'] }}
                    <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </a>
                @unless ($isMaintenance)
                    <a href="{{ route('layanan') }}" class="btn-secondary">
                        Lihat layanan
                    </a>
                @endunless
            </div>

            <a href="{{ route('home') }}" class="mt-10 font-heading text-sm font-semibold text-foreground transition-colors duration-200 hover:text-primary">
                ngodinglagi
            </a>
        </div>
    </main>
</x-errors.layout>
