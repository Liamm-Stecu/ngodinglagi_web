<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') · LagiNgoding</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|space-grotesk:500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('admin.partials.styles')
</head>
<body class="admin-shell antialiased">
    <div class="flex min-h-screen flex-col lg:flex-row">
        <aside class="admin-sidebar flex flex-col border-b border-white/5 p-4 lg:w-64 lg:shrink-0 lg:border-b-0 lg:border-r lg:p-5">
            <a href="{{ route('home') }}" class="animate-fade-up flex items-center gap-3 rounded-xl border border-white/5 bg-white/[.03] px-3 py-2.5" target="_blank">
                <span class="flex size-9 shrink-0 items-center justify-center rounded-xl bg-teal-500 text-white shadow-[0_6px_16px_rgba(13,148,136,.45)]" aria-hidden="true">
                    <svg class="size-[55%]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 6 5 12l6 6" />
                        <path d="m14 5 5 14" />
                    </svg>
                </span>
                <span class="min-w-0">
                    <span class="block font-heading text-sm font-semibold text-white">LagiNgoding</span>
                    <span class="block text-[11px] text-slate-400">Admin panel</span>
                </span>
                <svg class="ml-auto size-3.5 shrink-0 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 3h6v6"/><path d="M10 14 21 3"/></svg>
            </a>

            <p class="admin-side-label">Konten website</p>
            <nav class="flex flex-col gap-1" aria-label="Menu admin">
                @php
                    $nav = [
                        ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => '<rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/>'],
                        ['route' => 'admin.contact.edit', 'label' => 'Kontak', 'icon' => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>'],
                        ['route' => 'admin.services.edit', 'label' => 'Layanan', 'icon' => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>'],
                        ['route' => 'admin.portfolio.edit', 'label' => 'Tentang', 'icon' => '<path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>'],
                        ['route' => 'admin.partner.edit', 'label' => 'Mitra', 'icon' => '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>'],
                        ['route' => 'admin.messages.index', 'label' => 'Pesan', 'icon' => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>'],
                    ];
                @endphp
                @foreach ($nav as $i => $item)
                    <a
                        href="{{ route($item['route']) }}"
                        style="animation-delay: {{ 60 + $i * 40 }}ms"
                        @class(['animate-fade-up', 'active' => request()->routeIs($item['route'])])
                    >
                        <span class="admin-nav-icon" aria-hidden="true">
                            <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">{!! $item['icon'] !!}</svg>
                        </span>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="admin-side-foot mt-6 lg:mt-auto">
                <span class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-teal-500/15 text-teal-300" aria-hidden="true">
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </span>
                <span class="min-w-0 flex-1">
                    <span class="block truncate text-xs font-semibold text-slate-200">Admin</span>
                    <span class="block text-[11px] text-slate-500">Sesi aktif</span>
                </span>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-1.5 rounded-lg border border-white/5 bg-white/[.04] px-2.5 py-1.5 text-[11px] font-semibold text-slate-400 transition hover:border-red-400/30 hover:bg-red-500/10 hover:text-red-300" title="Keluar">
                        <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 px-4 py-6 sm:px-6 lg:px-8 lg:py-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
