<x-layout
    :title="'Kontak — ngodinglagi'"
    description="Hubungi ngodinglagi lewat WhatsApp, Instagram, atau Discord."
>
    <section class="relative overflow-hidden border-b border-border/60">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="decorative-blob -right-16 -top-20 size-64 bg-secondary/12 sm:size-80"></div>
            <div class="decorative-blob -bottom-24 -left-12 size-48 bg-primary/8" style="animation-delay: 1.8s"></div>
        </div>

        <div class="relative mx-auto w-full max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
            <div class="animate-rise-in max-w-2xl space-y-4">
                <p class="inline-flex items-center gap-2 rounded-full border border-primary/15 bg-primary/5 px-3 py-1 text-xs font-semibold uppercase tracking-[0.14em] text-primary">
                    Kontak
                </p>
                <h1 class="font-heading text-3xl font-semibold leading-tight tracking-tight text-foreground sm:text-4xl lg:text-5xl">
                    Ngobrol dulu aja
                </h1>
                <p class="text-base leading-relaxed text-muted-foreground sm:text-lg">
                    Pilih kanal yang paling nyaman. Ceritakan kebutuhannya — kita bahas lingkup kerja yang jelas sebelum mulai.
                </p>
            </div>
        </div>
    </section>

    <section class="mx-auto w-full max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
        <div class="grid gap-4 sm:gap-5 lg:grid-cols-12">
            {{-- Kanal utama --}}
            <div class="reveal space-y-4 lg:col-span-7" data-reveal>
                <div class="card-bento space-y-4 p-6 sm:p-8" aria-labelledby="wa-heading">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <span class="flex size-11 items-center justify-center rounded-xl bg-primary text-on-primary" aria-hidden="true">
                                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                            </span>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">Utama</p>
                                <h2 id="wa-heading" class="font-heading text-lg font-semibold text-foreground sm:text-xl">
                                    WhatsApp
                                </h2>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Paling cepat dibalas. Cocok untuk diskusi lingkup kerja, estimasi, atau tanya kemungkinan proyek.
                    </p>

                    <div class="flex flex-col gap-3 border-t border-border pt-4 sm:flex-row sm:items-center">
                        <p class="font-heading text-xl font-semibold tracking-tight text-foreground sm:text-2xl">
                            {{ config('contact.whatsapp.display') }}
                        </p>
                        <a
                            href="{{ config('contact.whatsapp.url') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="btn-primary sm:ml-auto"
                        >
                            Buka WhatsApp
                            <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14" />
                                <path d="m12 5 7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-2 sm:gap-4">
                    <div class="card-bento card-bento-hover flex flex-col gap-4 p-5 sm:p-6" aria-labelledby="ig-heading">
                        <div class="flex size-10 items-center justify-center rounded-xl bg-muted text-primary" aria-hidden="true">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                            </svg>
                        </div>
                        <div class="space-y-1">
                            <h2 id="ig-heading" class="font-heading text-base font-semibold text-foreground sm:text-lg">
                                Instagram
                            </h2>
                            <p class="text-sm text-muted-foreground">
                                {{ config('contact.instagram.display') }}
                            </p>
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

                    <div class="card-bento card-bento-hover flex flex-col gap-4 p-5 sm:p-6" aria-labelledby="dc-heading">
                        <div class="flex size-10 items-center justify-center rounded-xl bg-muted text-primary" aria-hidden="true">
                            <svg class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z" />
                            </svg>
                        </div>
                        <div class="space-y-1">
                            <h2 id="dc-heading" class="font-heading text-base font-semibold text-foreground sm:text-lg">
                                Discord
                            </h2>
                            <p class="break-all text-sm text-muted-foreground">
                                {{ config('contact.discord.display') }}
                            </p>
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
            </div>

            {{-- Side card --}}
            <aside class="reveal space-y-4 lg:col-span-5" data-reveal style="transition-delay: 80ms">
                <div class="card-bento space-y-5 p-6 sm:p-8" aria-labelledby="tips-heading">
                    <h2 id="tips-heading" class="font-heading text-lg font-semibold tracking-tight text-foreground sm:text-xl">
                        Biar cepat dijawab
                    </h2>
                    <ul class="space-y-3.5 text-sm text-muted-foreground">
                        @foreach ([
                            'Sebutkan jenis kebutuhan: website, SA-MP/Open.MP, atau VPS.',
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

                <div class="card-bento space-y-4 border-primary/15 bg-primary/[0.03] p-6 sm:p-8">
                    <h2 class="font-heading text-base font-semibold tracking-tight text-foreground">
                        Mau lihat dulu hasil kerjanya?
                    </h2>
                    <p class="text-sm leading-relaxed text-muted-foreground">
                        Cek ringkasan pengalaman: total proyek SA-MP dan website yang pernah dikerjakan.
                    </p>
                    <a href="{{ route('portofolio') }}" class="btn-secondary w-full sm:w-auto">
                        Lihat portofolio
                        <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m12 5 7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </aside>
        </div>
    </section>
</x-layout>
