@extends('admin.layout')

@section('title', 'Layanan')

@section('content')
<div class="mx-auto w-full max-w-4xl">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div class="animate-fade-up">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-teal-700">Panel</p>
            <h1 class="mt-1 font-heading text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Layanan</h1>
            <p class="mt-1 text-sm text-slate-500">Edit deskripsi, cakupan kerja, dan harga.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="admin-btn admin-btn-ghost">← Dashboard</a>
    </div>

    @if (session('status'))
        <div class="admin-flash animate-fade-up mb-4">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.services.update') }}" class="space-y-4">
        @csrf

        @foreach ($services as $i => $service)
            <fieldset class="admin-card animate-rise-in space-y-4" style="animation-delay: {{ 60 + $i * 80 }}ms">
                <legend class="px-2 font-heading text-sm font-semibold text-teal-700">
                    {{ data_get($service, 'title') }}
                </legend>

                <input type="hidden" name="services[{{ $i }}][slug]" value="{{ data_get($service, 'slug') }}">

                <div class="grid gap-3 sm:grid-cols-2">
                    <div>
                        <label class="admin-label">Judul</label>
                        <input class="admin-input" name="services[{{ $i }}][title]" value="{{ old("services.$i.title", data_get($service, 'title')) }}" required>
                    </div>
                    <div>
                        <label class="admin-label">Singkat</label>
                        <input class="admin-input" name="services[{{ $i }}][short]" value="{{ old("services.$i.short", data_get($service, 'short')) }}" required>
                    </div>
                </div>

                <div>
                    <label class="admin-label">Deskripsi</label>
                    <textarea class="admin-input" name="services[{{ $i }}][description]" rows="2" required>{{ old("services.$i.description", data_get($service, 'description')) }}</textarea>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                    <div>
                        <label class="admin-label">Cakupan kerja (satu per baris)</label>
                        <textarea class="admin-input" name="services[{{ $i }}][items_text]" rows="4" required>{{ old("services.$i.items_text", implode("\n", data_get($service, 'items', []))) }}</textarea>
                    </div>
                    <div>
                        <label class="admin-label">Cocok untuk (satu per baris)</label>
                        <textarea class="admin-input" name="services[{{ $i }}][for_text]" rows="4" required>{{ old("services.$i.for_text", implode("\n", data_get($service, 'for', []))) }}</textarea>
                    </div>
                </div>

                <div class="border-t border-slate-100 pt-4">
                    <div class="mb-3 flex items-center justify-between gap-3">
                        <span class="admin-label mb-0">Harga</span>
                        <div class="w-48">
                            <input class="admin-input" name="services[{{ $i }}][pricing][label]" value="{{ old("services.$i.pricing.label", data_get($service, 'pricing.label', 'Mulai dari')) }}" placeholder="Label">
                        </div>
                    </div>

                    @foreach (data_get($service, 'pricing.tiers', []) as $t => $tier)
                        <div class="mb-3 grid gap-2 rounded-xl border border-slate-100 bg-slate-50 p-3 sm:grid-cols-[1fr_1fr_1.4fr]">
                            <div>
                                <label class="admin-label">Nama</label>
                                <input class="admin-input" name="services[{{ $i }}][pricing][tiers][{{ $t }}][name]" value="{{ old("services.$i.pricing.tiers.$t.name", data_get($tier, 'name')) }}" required>
                            </div>
                            <div>
                                <label class="admin-label">Harga</label>
                                <input class="admin-input" name="services[{{ $i }}][pricing][tiers][{{ $t }}][price]" value="{{ old("services.$i.pricing.tiers.$t.price", data_get($tier, 'price')) }}" required>
                            </div>
                            <div>
                                <label class="admin-label">Catatan</label>
                                <input class="admin-input" name="services[{{ $i }}][pricing][tiers][{{ $t }}][note]" value="{{ old("services.$i.pricing.tiers.$t.note", data_get($tier, 'note')) }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </fieldset>
        @endforeach

        <div class="animate-fade-up flex flex-wrap gap-3" style="animation-delay: {{ 60 + count($services) * 80 }}ms">
            <button type="submit" class="admin-btn">Simpan semua</button>
            <a href="{{ route('layanan') }}" class="admin-btn admin-btn-ghost" target="_blank">Lihat halaman</a>
        </div>
    </form>

    <form method="POST" action="{{ route('admin.services.store') }}" class="mt-4">
        @csrf
        <button type="submit" class="admin-btn admin-btn-ghost w-full">+ Tambah layanan</button>
    </form>

    <div class="mt-6 space-y-3">
        @foreach ($services as $i => $service)
            <div class="flex flex-wrap items-center justify-between gap-2 rounded-xl border border-slate-200 bg-white px-4 py-3">
                <p class="text-sm font-medium text-slate-700">
                    {{ data_get($service, 'title') }}
                    <span class="ml-2 text-xs text-slate-400">{{ count(data_get($service, 'pricing.tiers', [])) }} tier</span>
                </p>
                <div class="flex flex-wrap gap-2">
                    <form method="POST" action="{{ route('admin.services.tier.store', $i) }}">
                        @csrf
                        <button type="submit" class="admin-btn admin-btn-ghost px-3 py-1.5 text-xs">+ Tier</button>
                    </form>
                    @foreach (data_get($service, 'pricing.tiers', []) as $t => $tier)
                        <form method="POST" action="{{ route('admin.services.tier.destroy', [$i, $t]) }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center rounded-lg border border-red-200 px-2.5 py-1.5 text-xs font-medium text-red-600 transition hover:bg-red-50" title="Hapus tier {{ data_get($tier, 'name') }}">
                                × {{ data_get($tier, 'name') }}
                            </button>
                        </form>
                    @endforeach
                    <form method="POST" action="{{ route('admin.services.destroy', $i) }}" onsubmit="return confirm('Hapus layanan ini?')">
                        @csrf
                        <button type="submit" class="inline-flex items-center rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 transition hover:bg-red-100">
                            Hapus layanan
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
