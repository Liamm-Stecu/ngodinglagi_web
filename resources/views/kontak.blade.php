<x-layout
    :title="'Kontak — LagiNgoding'"
    description="Hubungi LagiNgoding lewat WhatsApp, Instagram, atau Discord."
>
    <section class="relative overflow-hidden border-b border-border/50">
        <div class="mesh-gradient" aria-hidden="true"></div>
        <div class="grid-pattern" aria-hidden="true"></div>
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="decorative-blob -right-16 -top-20 size-64 bg-secondary/10 sm:size-80"></div>
            <div class="decorative-blob -bottom-24 -left-12 size-48 bg-primary/6" style="animation-delay: 1.8s"></div>
        </div>

        <div class="relative mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8 lg:py-20">
            <div class="max-w-2xl space-y-4">
                <p class="pill-badge animate-rise-in">Kontak</p>
                <h1 class="animate-rise-in font-heading text-2xl font-semibold leading-tight tracking-tight text-foreground sm:text-4xl lg:text-5xl" style="animation-delay: 70ms">
                    Got a Project? Let's Talk
                </h1>
                <p class="animate-rise-in text-[15px] leading-relaxed text-muted-foreground sm:text-lg" style="animation-delay: 140ms">
                    Pilih kanal yang paling nyaman. Ceritakan kebutuhannya — kita bahas lingkup kerja yang jelas sebelum mulai.
                </p>
            </div>
        </div>
    </section>

    <section class="mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8">
        <div class="grid gap-4 sm:gap-5 lg:grid-cols-12">
            {{-- Form utama --}}
            <div class="lg:col-span-7">
                <div class="card-bento reveal h-full space-y-5 p-6 sm:p-8" data-reveal aria-labelledby="form-heading">
                    <div class="space-y-1.5">
                        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-primary">Form pesan</p>
                        <h2 id="form-heading" class="font-heading text-lg font-semibold tracking-tight text-foreground sm:text-xl">
                            Kirim pesan
                        </h2>
                        <p class="text-sm text-muted-foreground">
                            Isi form di bawah — atau langsung WhatsApp saja kalau mau lebih cepat.
                        </p>
                    </div>

                    @if (session('contact_success'))
                        <div role="status" class="rounded-xl border border-primary/20 bg-primary/5 px-4 py-3 text-sm font-medium text-primary">
                            {{ session('contact_success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('kontak.store') }}" class="space-y-4" novalidate>
                        @csrf

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label for="contact-name" class="mb-1.5 block text-sm font-medium text-foreground">
                                    Nama <span class="text-primary" aria-hidden="true">*</span>
                                </label>
                                <input
                                    id="contact-name"
                                    name="name"
                                    type="text"
                                    required
                                    maxlength="100"
                                    autocomplete="name"
                                    value="{{ old('name') }}"
                                    class="block w-full min-h-11 rounded-lg border border-border bg-background px-3.5 py-2.5 text-sm text-foreground placeholder:text-muted-foreground focus:border-primary focus:outline-2 focus:outline-primary/20 transition-colors duration-150 @error('name') border-destructive @enderror"
                                    placeholder="Nama kamu"
                                >
                                @error('name')
                                    <p class="mt-1.5 text-xs text-destructive">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="contact-email" class="mb-1.5 block text-sm font-medium text-foreground">
                                    Email <span class="text-xs font-normal text-muted-foreground">(opsional)</span>
                                </label>
                                <input
                                    id="contact-email"
                                    name="email"
                                    type="email"
                                    maxlength="255"
                                    autocomplete="email"
                                    value="{{ old('email') }}"
                                    class="block w-full min-h-11 rounded-lg border border-border bg-background px-3.5 py-2.5 text-sm text-foreground placeholder:text-muted-foreground focus:border-primary focus:outline-2 focus:outline-primary/20 transition-colors duration-150 @error('email') border-destructive @enderror"
                                    placeholder="nama@email.com"
                                >
                                @error('email')
                                    <p class="mt-1.5 text-xs text-destructive">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="contact-message" class="mb-1.5 block text-sm font-medium text-foreground">
                                Pesan <span class="text-primary" aria-hidden="true">*</span>
                            </label>
                            <textarea
                                id="contact-message"
                                name="message"
                                required
                                rows="6"
                                minlength="10"
                                maxlength="2000"
                                class="block w-full rounded-lg border border-border bg-background px-3.5 py-2.5 text-sm text-foreground placeholder:text-muted-foreground focus:border-primary focus:outline-2 focus:outline-primary/20 transition-colors duration-150 resize-y @error('message') border-destructive @enderror"
                                placeholder="Ceritakan kebutuhannya: website, SA-MP/Open.MP, atau VPS…"
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1.5 text-xs text-destructive">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn-primary w-full">
                            Kirim pesan
                            <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14" />
                                <path d="m12 5 7 7-7 7" />
                            </svg>
                        </button>

                        <p class="text-center text-xs text-muted-foreground">
                            Lebih suka chat langsung?
                            <a href="{{ \App\Support\WaLink::make(config('contact.whatsapp.url'), 'Halo LagiNgoding, saya ingin mendiskusikan kebutuhan saya.') }}" target="_blank" rel="noopener noreferrer" class="font-semibold text-primary hover:underline">
                                WhatsApp aja
                            </a>
                        </p>
                    </form>
                </div>
            </div>

            {{-- Kanal & tips --}}
            <aside class="space-y-4 lg:col-span-5">
                <div class="card-bento reveal space-y-4 border-primary/20 bg-gradient-to-br from-primary/[0.06] to-transparent p-6 sm:p-7" data-reveal style="transition-delay: 60ms" aria-labelledby="wa-heading">
                    <div class="flex items-center gap-3">
                        <span class="flex size-11 items-center justify-center rounded-xl bg-primary text-on-primary shadow-[0_4px_12px_rgba(15,118,110,0.2)]" aria-hidden="true">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                        </span>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-primary">Kanal utama · paling cepat dibalas</p>
                            <h2 id="wa-heading" class="font-heading text-lg font-semibold text-foreground sm:text-xl">
                                WhatsApp
                            </h2>
                        </div>
                    </div>

                    <p class="font-heading text-xl font-semibold tracking-tight text-foreground sm:text-2xl">
                        {{ config('contact.whatsapp.display') }}
                    </p>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Cocok untuk diskusi lingkup kerja, estimasi, atau tanya kemungkinan proyek.
                    </p>

                    <a
                        href="{{ \App\Support\WaLink::make(config('contact.whatsapp.url'), 'Halo LagiNgoding, saya ingin mendiskusikan kebutuhan saya.') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn-primary w-full"
                    >
                        Buka WhatsApp
                        <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m12 5 7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="grid gap-3 sm:grid-cols-2 sm:gap-4" data-stagger>
                    <div class="card-bento card-bento-hover reveal flex flex-col gap-3 p-5" data-reveal style="transition-delay: 100ms" aria-labelledby="ig-heading">
                        <div class="flex items-center gap-2.5">
                            <span class="flex size-9 items-center justify-center rounded-lg bg-muted text-primary" aria-hidden="true">
                                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                                </svg>
                            </span>
                            <div class="min-w-0">
                                <h2 id="ig-heading" class="font-heading text-sm font-semibold text-foreground">
                                    Instagram
                                </h2>
                                <p class="truncate text-xs text-muted-foreground">
                                    {{ config('contact.instagram.display') }}
                                </p>
                            </div>
                        </div>
                        <a
                            href="{{ config('contact.instagram.url') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="btn-secondary mt-auto w-full"
                        >
                            Buka Instagram
                        </a>
                    </div>

                    <div class="card-bento card-bento-hover reveal flex flex-col gap-3 p-5" data-reveal style="transition-delay: 160ms" aria-labelledby="dc-heading">
                        <div class="flex items-center gap-2.5">
                            <span class="flex size-9 items-center justify-center rounded-lg bg-muted text-primary" aria-hidden="true">
                                <svg class="size-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z" />
                                </svg>
                            </span>
                            <div class="min-w-0">
                                <h2 id="dc-heading" class="font-heading text-sm font-semibold text-foreground">
                                    Discord
                                </h2>
                                <p class="truncate text-xs text-muted-foreground">
                                    {{ config('contact.discord.display') }}
                                </p>
                            </div>
                        </div>
                        <button
                            type="button"
                            data-copy="{{ config('contact.discord.display') }}"
                            class="btn-secondary group/clip mt-auto w-full cursor-pointer"
                        >
                            <span data-copy-label>Salin username</span>
                        </button>
                    </div>
                </div>

                <div class="card-bento reveal space-y-3.5 p-6" data-reveal style="transition-delay: 200ms" aria-labelledby="tips-heading">
                    <h2 id="tips-heading" class="font-heading text-base font-semibold tracking-tight text-foreground">
                        Biar cepat dijawab
                    </h2>
                    <ul class="space-y-3 text-sm text-muted-foreground">
                        @foreach ([
                            'Sebutkan jenis kebutuhan: website, SA-MP/Open.MP, VPS, atau editing.',
                            'Kalau sudah ada deadline atau referensi, cantumkan sekilas.',
                            'Untuk server game, sebutkan jumlah player & fitur yang diinginkan.',
                        ] as $tip)
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 flex size-5 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary" aria-hidden="true">
                                    <svg class="size-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                                {{ $tip }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </section>

    @if (! empty($faq))
        <section class="border-t border-border/60 bg-muted/30" aria-labelledby="faq-heading">
            <div class="mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 sm:py-14 lg:px-8 lg:py-16">
                <div class="grid gap-8 lg:grid-cols-[minmax(0,4fr)_minmax(0,7fr)] lg:gap-14">
                    <div class="space-y-4">
                        <p class="pill-badge">FAQ</p>
                        <h2 id="faq-heading" class="font-heading text-xl font-semibold tracking-tight text-foreground sm:text-3xl">
                            Pertanyaan yang sering muncul
                        </h2>
                        <p class="text-sm leading-relaxed text-muted-foreground">
                            Belum terjawab di sini? Tanya langsung lewat WhatsApp — dibalas secepatnya.
                        </p>
                        <a
                            href="{{ \App\Support\WaLink::make(config('contact.whatsapp.url'), 'Halo LagiNgoding, saya punya pertanyaan.') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary transition hover:gap-2.5"
                        >
                            Tanya lewat WhatsApp
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
