<x-error-shell title="Offline">
    <main class="relative flex min-h-screen w-full flex-col items-center justify-center overflow-hidden px-4 py-12">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_55%_45%_at_50%_50%,#0f766e14,transparent_75%)]"></div>
        </div>

        <div class="relative z-10 flex w-full max-w-md flex-col items-center text-center">
            <div class="relative mb-6" aria-hidden="true">
                <div class="float-soft flex size-28 items-center justify-center rounded-3xl border border-border bg-card shadow-card">
                    <svg class="size-14 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12.55a11 11 0 0 1 14.08 0" />
                        <path d="M1.42 9a16 16 0 0 1 21.16 0" />
                        <path d="M8.53 16.11a6 6 0 0 1 6.95 0" />
                        <circle cx="12" cy="20" r="0.5" fill="currentColor" />
                    </svg>
                </div>
                <span class="error-ring absolute -inset-2 rounded-[1.6rem] border-2 border-dashed border-primary/35" aria-hidden="true"></span>
            </div>

            <p class="error-retry mb-7 inline-flex items-center gap-1.5 text-xs font-medium uppercase tracking-[0.14em] text-muted-foreground" aria-hidden="true">
                mencoba menyambung ulang
                <span class="error-dot"></span>
                <span class="error-dot" style="animation-delay: 0.2s"></span>
                <span class="error-dot" style="animation-delay: 0.4s"></span>
            </p>

            <h1 class="font-heading text-2xl font-semibold tracking-tight text-foreground sm:text-3xl">
                Sinyal putus sebentar
            </h1>

            <p class="mt-3 max-w-sm text-sm leading-relaxed text-muted-foreground sm:text-base">
                Koneksi kamu terputus dari server. Halaman ini tersimpan di browser — begitu sinyal balik, coba muat ulang.
            </p>

            <div class="mt-8 flex flex-col items-center gap-3 sm:flex-row">
                <button
                    type="button"
                    onclick="window.location.reload()"
                    class="btn-primary"
                >
                    Coba lagi
                    <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12a9 9 0 1 1-2.64-6.36" />
                        <polyline points="21 3 21 9 15 9" />
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="btn-secondary">
                    Ke beranda
                </a>
            </div>

            <a href="{{ route('home') }}" class="mt-10 font-heading text-sm font-semibold text-foreground transition-colors duration-200 hover:text-primary">
                ngodinglagi
            </a>
        </div>
    </main>
</x-error-shell>
