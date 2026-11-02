<x-layout
    :title="'Changelog — LagiNgoding'"
    description="Update terbaru dari LagiNgoding: fitur baru dan perbaikan website."
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
                    Update
                </p>
                <h1 class="animate-rise-in font-heading text-2xl font-semibold leading-tight tracking-tight text-foreground sm:text-4xl lg:text-5xl" style="animation-delay: 70ms">
                    Changelog
                </h1>
                <p class="animate-rise-in text-[15px] leading-relaxed text-muted-foreground sm:text-lg" style="animation-delay: 140ms">
                    Catatan perubahan dan peningkatan website LagiNgoding.
                </p>
            </div>
        </div>
    </section>

    <section class="mx-auto w-full max-w-3xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8">
        @php $entries = config('content.changelog', []); @endphp

        @if (empty($entries))
            <p class="text-sm text-muted-foreground">Belum ada update.</p>
        @else
            <ol class="relative space-y-8 border-l border-border pl-6 sm:pl-8">
                @foreach ($entries as $entry)
                    <li class="reveal relative" data-reveal>
                        <span class="absolute -left-[calc(1.5rem+5px)] top-1.5 size-2.5 rounded-full border-2 border-background bg-primary sm:-left-[calc(2rem+5px)]" aria-hidden="true"></span>
                        <time datetime="{{ $entry['date'] }}" class="text-xs font-medium uppercase tracking-wider text-primary">
                            {{ \Illuminate\Support\Carbon::parse($entry['date'])->translatedFormat('d M Y') }}
                        </time>
                        <h2 class="mt-1 font-heading text-base font-semibold text-foreground sm:text-lg">
                            {{ $entry['title'] }}
                        </h2>
                        <ul class="mt-2 space-y-1.5 text-sm text-muted-foreground">
                            @foreach ($entry['items'] as $item)
                                <li class="flex items-start gap-2">
                                    <span class="mt-1.5 size-1 shrink-0 rounded-full bg-muted-foreground/50" aria-hidden="true"></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ol>
        @endif

        <div class="mt-10 border-t border-border pt-6">
            <a href="{{ route('home') }}" class="btn-secondary">
                Kembali ke beranda
            </a>
        </div>
    </section>
</x-layout>
