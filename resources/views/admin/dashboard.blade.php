@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="mx-auto w-full max-w-5xl space-y-6">
    <header class="flex flex-wrap items-end justify-between gap-3">
        <div class="animate-fade-up">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-teal-700">Panel</p>
            <h1 class="mt-1 font-heading text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Dashboard</h1>
            <p class="mt-1 text-sm text-slate-500">Ringkasan konten &amp; pintasan edit website.</p>
        </div>
        <a href="{{ route('home') }}" target="_blank" class="admin-btn admin-btn-ghost">
            Lihat website
            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
        </a>
    </header>

    @if (session('status'))
        <div class="admin-flash animate-fade-up">{{ session('status') }}</div>
    @endif

    {{-- KPI --}}
    <section class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4" aria-label="Statistik ringkas">
        @php
            $kpis = [
                ['label' => 'Proyek total', 'value' => $totalProjects, 'hint' => 'SA-MP + website', 'route' => 'admin.portfolio.edit'],
                ['label' => 'Layanan', 'value' => $serviceCount, 'hint' => 'item aktif', 'route' => 'admin.services.edit'],
                ['label' => 'Tier harga', 'value' => $tierCount, 'hint' => 'paket pricing', 'route' => 'admin.services.edit'],
                ['label' => 'Kategori', 'value' => $categoryCount, 'hint' => 'portofolio', 'route' => 'admin.portfolio.edit'],
            ];
        @endphp
        @foreach ($kpis as $i => $kpi)
            <a
                href="{{ route($kpi['route']) }}"
                class="admin-card admin-kpi animate-rise-in"
                style="animation-delay: {{ $i * 70 }}ms"
            >
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">{{ $kpi['label'] }}</p>
                <p class="mt-2 font-heading text-3xl font-semibold tracking-tight text-slate-900">
                    <span data-count-to="{{ $kpi['value'] }}">{{ $kpi['value'] }}</span>
                </p>
                <p class="mt-1 text-xs text-slate-500">{{ $kpi['hint'] }}</p>
            </a>
        @endforeach
    </section>

    <section class="grid gap-4 lg:grid-cols-5">
        {{-- Donut portofolio --}}
        <article class="admin-card animate-rise-in lg:col-span-2" style="animation-delay: 100ms">
            <header class="mb-4">
                <h2 class="font-heading text-base font-semibold text-slate-900">Komposisi proyek</h2>
                <p class="text-xs text-slate-500">Rasio SA-MP vs website</p>
            </header>

            <div class="flex items-center gap-5">
                <div class="relative size-32 shrink-0">
                    <svg class="size-32 -rotate-90" viewBox="0 0 100 100" role="img" aria-label="Donut chart komposisi proyek: SA-MP {{ $sampPct }} persen, website {{ $webPct }} persen">
                        <circle cx="50" cy="50" r="40" fill="none" stroke="#e2e8f0" stroke-width="12"/>
                        <circle
                            class="chart-donut-circle"
                            cx="50" cy="50" r="40"
                            fill="none"
                            stroke="#0f766e"
                            stroke-width="12"
                            stroke-linecap="round"
                            stroke-dasharray="{{ $circumference }}"
                            stroke-dashoffset="{{ $circumference }}"
                            data-donut-offset="{{ round($circumference - ($sampPct / 100) * $circumference, 2) }}"
                        />
                        <circle
                            class="chart-donut-circle"
                            cx="50" cy="50" r="40"
                            fill="none"
                            stroke="#5eead4"
                            stroke-width="12"
                            stroke-linecap="round"
                            stroke-dasharray="{{ round(($webPct / 100) * $circumference, 2) }} {{ $circumference }}"
                            stroke-dashoffset="{{ round(-($sampPct / 100) * $circumference, 2) }}"
                            style="opacity: 0"
                            data-donut-opacity="1"
                            data-donut-delay="200"
                        />
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="font-heading text-2xl font-semibold text-slate-900">
                            <span data-count-to="{{ $totalProjects }}">{{ $totalProjects }}</span>
                        </span>
                        <span class="text-[10px] uppercase tracking-wider text-slate-400">proyek</span>
                    </div>
                </div>

                <ul class="space-y-3 text-sm">
                    <li class="flex items-center gap-2">
                        <span class="size-2.5 rounded-full bg-teal-700" aria-hidden="true"></span>
                        <span class="text-slate-600">SA-MP</span>
                        <span class="ml-auto font-semibold text-slate-900">{{ $samp }} · {{ $sampPct }}%</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="size-2.5 rounded-full bg-teal-300" aria-hidden="true"></span>
                        <span class="text-slate-600">Website</span>
                        <span class="ml-auto font-semibold text-slate-900">{{ $web }} · {{ $webPct }}%</span>
                    </li>
                </ul>
            </div>

            <a href="{{ route('admin.portfolio.edit') }}" class="mt-5 inline-flex items-center gap-1 text-xs font-semibold text-teal-700 hover:text-teal-800">
                Edit portofolio
                <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </article>

        {{-- Bar harga --}}
        <article class="admin-card animate-rise-in lg:col-span-3" style="animation-delay: 160ms">
            <header class="mb-4 flex items-start justify-between gap-3">
                <div>
                    <h2 class="font-heading text-base font-semibold text-slate-900">Harga layanan</h2>
                    <p class="text-xs text-slate-500">Tier termahal (relatif)</p>
                </div>
                <a href="{{ route('admin.services.edit') }}" class="text-xs font-semibold text-teal-700 hover:text-teal-800">Edit</a>
            </header>

            @if (empty($tierPrices))
                <p class="text-sm text-slate-500">Belum ada data harga.</p>
            @else
                <ul class="space-y-3.5">
                    @foreach ($tierPrices as $i => $tier)
                        <li>
                            <div class="mb-1.5 flex items-baseline justify-between gap-2 text-sm">
                                <span class="truncate font-medium text-slate-800">{{ $tier['name'] }}</span>
                                <span class="shrink-0 text-xs font-semibold text-teal-700">{{ $tier['display'] }}</span>
                            </div>
                            <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                                <div
                                    class="chart-bar-fill h-full rounded-full bg-linear-to-r from-teal-600 to-cyan-400"
                                    style="width: {{ $tier['pct'] }}%; animation-delay: {{ 200 + $i * 90 }}ms"
                                    role="img"
                                    aria-label="{{ $tier['name'] }} {{ $tier['display'] }}"
                                ></div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </article>
    </section>

    {{-- Pintasan --}}
    <section class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4" aria-label="Pintasan edit">
        @php
            $links = [
                ['route' => 'admin.contact.edit', 'title' => 'Kontak', 'desc' => data_get($contact, 'whatsapp.display', '—'), 'icon' => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>'],
                ['route' => 'admin.services.edit', 'title' => 'Layanan', 'desc' => $serviceCount . ' layanan + harga', 'icon' => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>'],
                ['route' => 'admin.portfolio.edit', 'title' => 'Portofolio', 'desc' => $samp . ' SA-MP · ' . $web . ' web', 'icon' => '<path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>'],
                ['route' => 'admin.partner.edit', 'title' => 'Mitra', 'desc' => data_get($affiliate, 'partner', '—'), 'icon' => '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>'],
            ];
        @endphp
        @foreach ($links as $i => $link)
            <a
                href="{{ route($link['route']) }}"
                class="admin-card admin-kpi animate-rise-in"
                style="animation-delay: {{ 220 + $i * 60 }}ms"
            >
                <div class="mb-3 flex size-9 items-center justify-center rounded-xl bg-teal-50 text-teal-700">
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $link['icon'] !!}</svg>
                </div>
                <p class="font-heading text-sm font-semibold text-slate-900">{{ $link['title'] }}</p>
                <p class="mt-0.5 truncate text-xs text-slate-500">{{ $link['desc'] }}</p>
            </a>
        @endforeach
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('[data-donut-offset]').forEach(function (circle) {
        if (reduce) {
            circle.style.strokeDashoffset = circle.getAttribute('data-donut-offset');
            return;
        }
        requestAnimationFrame(function () {
            circle.style.strokeDashoffset = circle.getAttribute('data-donut-offset');
        });
    });

    document.querySelectorAll('[data-donut-opacity]').forEach(function (el) {
        if (reduce) {
            el.style.opacity = '1';
            return;
        }
        var delay = Number(el.getAttribute('data-donut-delay') || 200);
        setTimeout(function () {
            el.style.transition = 'opacity .5s ease';
            el.style.opacity = '1';
        }, delay);
    });
});
</script>
@endsection
