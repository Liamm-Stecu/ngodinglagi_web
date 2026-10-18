<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') · ngodinglagi</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|space-grotesk:500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .admin-shell { min-height: 100vh; background: #f8fafc; color: #0f172a; }
        .admin-sidebar { background: #0f172a; color: #94a3b8; }
        .admin-sidebar a { display: flex; align-items: center; gap: .7rem; padding: .7rem .85rem; border-radius: .8rem; font-size: .9rem; font-weight: 500; color: #94a3b8; transition: background .18s ease, color .18s ease, transform .18s ease; }
        .admin-sidebar a:hover { background: rgba(255,255,255,.06); color: #f8fafc; transform: translateX(2px); }
        .admin-sidebar a.active { background: #0f766e; color: #fff; box-shadow: 0 8px 20px rgba(15,118,110,.28); }
        .admin-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 1rem; padding: 1.35rem; box-shadow: 0 1px 2px rgba(15,23,42,.03); }
        .admin-label { display: block; font-size: .72rem; font-weight: 600; text-transform: uppercase; letter-spacing: .07em; color: #64748b; margin-bottom: .35rem; }
        .admin-input { width: 100%; border: 1px solid #e2e8f0; border-radius: .75rem; background: #f8fafc; padding: .65rem .85rem; font-size: .9rem; color: #0f172a; transition: border-color .15s ease, box-shadow .15s ease, background .15s ease; }
        .admin-input:focus { outline: none; border-color: #0f766e; background: #fff; box-shadow: 0 0 0 3px rgba(15,118,110,.15); }
        .admin-btn { display: inline-flex; align-items: center; justify-content: center; gap: .4rem; background: #0f766e; color: #fff; font-weight: 600; font-size: .875rem; border-radius: .85rem; padding: .65rem 1.1rem; transition: background .15s ease, transform .15s ease, box-shadow .15s ease; }
        .admin-btn:hover { background: #0d9488; transform: translateY(-1px); box-shadow: 0 8px 18px rgba(15,118,110,.25); }
        .admin-btn-ghost { background: #fff; color: #0f766e; border: 1px solid #99f6e4; }
        .admin-btn-ghost:hover { background: #f0fdfa; box-shadow: none; }
        .admin-error { color: #b91c1c; font-size: .8rem; background: #fef2f2; border: 1px solid #fecaca; border-radius: .7rem; padding: .65rem .85rem; }
        .admin-flash { background: #ecfdf5; border: 1px solid #99f6e4; color: #0f766e; border-radius: .85rem; padding: .75rem 1rem; font-size: .875rem; }
        .admin-kpi { transition: border-color .18s ease, box-shadow .18s ease, transform .18s ease; }
        .admin-kpi:hover { border-color: #5eead4; box-shadow: 0 10px 28px rgba(15,23,42,.06); transform: translateY(-2px); }
        .chart-donut-circle { transition: stroke-dashoffset 1s cubic-bezier(.22,1,.36,1); }
        .chart-bar-fill { transform-origin: left center; animation: bar-grow .8s cubic-bezier(.22,1,.36,1) both; }
        @keyframes bar-grow { from { transform: scaleX(0); } to { transform: scaleX(1); } }
        @media (prefers-reduced-motion: reduce) {
            .admin-kpi, .admin-sidebar a, .admin-btn, .admin-input { transition: none !important; transform: none !important; }
            .chart-bar-fill, .chart-donut-circle { animation: none !important; transition: none !important; }
        }
    </style>
</head>
<body class="admin-shell font-body antialiased">
    <div class="flex min-h-screen flex-col lg:flex-row">
        <aside class="admin-sidebar flex flex-col gap-1 border-b border-white/5 p-4 lg:w-60 lg:shrink-0 lg:border-b-0 lg:border-r lg:p-5">
            <a href="{{ route('home') }}" class="mb-4 flex items-center gap-2.5 px-1 py-1">
                <span class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-teal-500 text-white shadow-[0_6px_16px_rgba(13,148,136,.35)]" aria-hidden="true">
                    <svg class="size-[58%]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 6 5 12l6 6" />
                        <path d="m14 5 5 14" />
                    </svg>
                </span>
                <span>
                    <span class="block font-heading text-sm font-semibold text-white">ngodinglagi</span>
                    <span class="block text-[11px] text-slate-400">Admin panel</span>
                </span>
            </a>

            <nav class="flex flex-col gap-1" aria-label="Menu admin">
                @php
                    $nav = [
                        ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => '<rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/>'],
                        ['route' => 'admin.contact.edit', 'label' => 'Kontak', 'icon' => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>'],
                        ['route' => 'admin.services.edit', 'label' => 'Layanan', 'icon' => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>'],
                        ['route' => 'admin.portfolio.edit', 'label' => 'Portofolio', 'icon' => '<path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>'],
                        ['route' => 'admin.partner.edit', 'label' => 'Mitra', 'icon' => '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>'],
                    ];
                @endphp
                @foreach ($nav as $item)
                    <a href="{{ route($item['route']) }}" @class(['active' => request()->routeIs($item['route'])])>
                        <svg class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $item['icon'] !!}</svg>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto pt-4">
                @csrf
                <button type="submit" class="flex w-full items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-slate-400 transition hover:bg-white/5 hover:text-red-300">
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                    Keluar
                </button>
            </form>
        </aside>

        <main class="flex-1 px-4 py-6 sm:px-6 lg:px-8 lg:py-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
