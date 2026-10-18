@extends('admin.layout')

@section('title', 'Layanan')

@section('content')
<div class="mx-auto w-full max-w-4xl">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div class="animate-fade-up">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-teal-700">Panel</p>
            <h1 class="mt-1 font-heading text-2xl font-semibold tracking-tight text-slate-900">Layanan</h1>
            <p class="mt-1 text-sm text-slate-500">Edit deskripsi, cakupan kerja, dan harga.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="admin-btn admin-btn-ghost">← Dashboard</a>
    </div>

    @if (session('status'))
        <div class="admin-flash mb-4">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.services.update') }}" class="space-y-4">
        @csrf

        @foreach ($services as $i => $service)
            <fieldset class="admin-card space-y-4">
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

        <div class="flex gap-3">
            <button type="submit" class="admin-btn">Simpan semua</button>
            <a href="{{ route('layanan') }}" class="admin-btn admin-btn-ghost" target="_blank">Lihat halaman</a>
        </div>
    </form>
</div>
@endsection
