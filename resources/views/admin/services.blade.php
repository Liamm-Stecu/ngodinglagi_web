@extends('admin.modal')

@section('title', 'Layanan')
@section('modal-eyebrow', 'Edit konten')
@section('modal-title', 'Layanan')
@section('modal-subtitle', 'Klik salah satu layanan untuk buka edit & daftar harga.')
@section('modal-size', 'admin-modal-lg')
@section('modal-icon')
<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.services.update') }}" id="admin-edit-form" class="space-y-3">
    @csrf

    @foreach ($services as $i => $service)
        @php
            $tiers = data_get($service, 'pricing.tiers', []);
            $openOnError = $errors->any();
        @endphp
        <div
            class="accordion-item admin-acc {{ $openOnError ? 'is-open' : '' }}"
            data-accordion-item
        >
            <h2 class="m-0">
                <button
                    type="button"
                    class="admin-acc-trigger"
                    data-accordion-trigger
                    aria-expanded="{{ $openOnError ? 'true' : 'false' }}"
                    aria-controls="svc-panel-{{ $i }}"
                >
                    <span class="admin-icon-chip size-9 shrink-0" aria-hidden="true">
                        @switch(data_get($service, 'slug'))
                            @case('web')
                                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                                @break
                            @case('samp')
                                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M6 11h4"/><path d="M8 9v4"/><path d="M15 12h.01"/><path d="M18 10h.01"/><path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"/></svg>
                                @break
                            @default
                                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="8" x="2" y="2" rx="2" ry="2"/><rect width="20" height="8" x="2" y="14" rx="2" ry="2"/><line x1="6" x2="6.01" y1="6" y2="6"/><line x1="6" x2="6.01" y1="18" y2="18"/></svg>
                        @endswitch
                    </span>

                    <span class="min-w-0 flex-1">
                        <span class="block truncate font-heading text-sm font-semibold text-slate-900">
                            {{ data_get($service, 'title') }}
                        </span>
                        <span class="mt-0.5 block truncate text-xs text-slate-500">
                            {{ data_get($service, 'short') }}
                        </span>
                    </span>

                    <span class="hidden shrink-0 items-center gap-2 sm:flex">
                        <span class="rounded-full border border-teal-100 bg-teal-50 px-2.5 py-1 text-[11px] font-semibold text-teal-700">
                            {{ count($tiers) }} tier
                        </span>
                        @if (! empty($tiers[0]['price']))
                            <span class="text-xs font-semibold text-teal-700">{{ $tiers[0]['price'] }}</span>
                        @endif
                    </span>

                    <span class="flex size-8 shrink-0 items-center justify-center rounded-full border border-slate-200 bg-slate-50 text-slate-500" aria-hidden="true">
                        <svg class="accordion-chevron size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </span>
                </button>
            </h2>

            <div class="accordion-panel" id="svc-panel-{{ $i }}" role="region" aria-label="Edit {{ data_get($service, 'title') }}">
                <div class="accordion-inner">
                    <div class="admin-acc-body space-y-4 border-t border-slate-100">
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

                        <div class="rounded-xl border border-slate-100 bg-slate-50/80 p-3.5">
                            <div class="mb-3 flex items-center justify-between gap-3">
                                <span class="admin-label admin-label--flush">Harga</span>
                                <div class="w-44">
                                    <input class="admin-input" name="services[{{ $i }}][pricing][label]" value="{{ old("services.$i.pricing.label", data_get($service, 'pricing.label', 'Mulai dari')) }}" placeholder="Label">
                                </div>
                            </div>

                            @foreach ($tiers as $t => $tier)
                                <div class="mb-2.5 grid gap-2 rounded-lg border border-slate-200/80 bg-white p-3 sm:grid-cols-[1fr_1fr_1.4fr] last:mb-0">
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
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</form>

<div class="mt-5 rounded-xl border border-dashed border-slate-200 bg-white/60 p-4">
    <p class="admin-section-title mb-1">Kelola layanan &amp; tier</p>
    <p class="mb-3 text-xs text-slate-500">Tambah atau hapus item di sini — jangan lupa tekan <span class="font-semibold text-teal-700">Simpan semua</span> setelah edit form.</p>

    <div class="space-y-3">
        <form method="POST" action="{{ route('admin.services.store') }}">
            @csrf
            <button type="submit" class="admin-btn admin-btn-ghost w-full">+ Tambah layanan</button>
        </form>

        @foreach ($services as $i => $service)
            <div class="flex flex-wrap items-center justify-between gap-2 rounded-xl border border-slate-200 bg-white px-4 py-3">
                <p class="text-sm font-medium text-slate-700">
                    {{ data_get($service, 'title') }}
                    <span class="ml-2 text-xs text-slate-400">{{ count(data_get($service, 'pricing.tiers', [])) }} tier</span>
                </p>
                <div class="flex flex-wrap gap-2">
                    <form method="POST" action="{{ route('admin.services.tier.store', $i) }}">
                        @csrf
                        <button type="submit" class="admin-btn admin-btn-sm admin-btn-soft">+ Tier</button>
                    </form>
                    @foreach (data_get($service, 'pricing.tiers', []) as $t => $tier)
                        <form method="POST" action="{{ route('admin.services.tier.destroy', [$i, $t]) }}">
                            @csrf
                            <button type="submit" class="admin-btn admin-btn-sm admin-btn-danger" title="Hapus tier {{ data_get($tier, 'name') }}">
                                × {{ data_get($tier, 'name') }}
                            </button>
                        </form>
                    @endforeach
                    <form method="POST" action="{{ route('admin.services.destroy', $i) }}" onsubmit="return confirm('Hapus layanan ini?')">
                        @csrf
                        <button type="submit" class="admin-btn admin-btn-sm admin-btn-danger">
                            Hapus layanan
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('modal-actions')
    <button type="submit" form="admin-edit-form" class="admin-btn">Simpan semua</button>
    <a href="{{ route('layanan') }}" class="admin-btn admin-btn-ghost" target="_blank">Lihat halaman</a>
@endsection
