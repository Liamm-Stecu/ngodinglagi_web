@extends('admin.modal')

@section('title', 'Layanan')
@section('modal-eyebrow', 'Kelola konten')
@section('modal-title', 'Layanan')
@section('modal-subtitle', 'Pilih layanan untuk diedit, atau buat layanan baru.')
@section('modal-size', 'admin-modal-lg')
@section('modal-icon')
<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
@endsection

@section('content')
<div class="space-y-2.5">
    @forelse ($services as $i => $service)
        @php
            $tiers = data_get($service, 'pricing.tiers', []);
        @endphp
        <div class="flex flex-wrap items-center justify-between gap-3 rounded-xl border border-slate-200 bg-white p-4">
            <div class="flex min-w-0 items-center gap-3">
                <span class="admin-icon-chip size-9 shrink-0" aria-hidden="true">
                    @switch(data_get($service, 'slug'))
                        @case('web')
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                            @break
                        @case('samp')
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M6 11h4"/><path d="M8 9v4"/><path d="M15 12h.01"/><path d="M18 10h.01"/><path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"/></svg>
                            @break
                        @case('editing')
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M7 3v18"/><path d="M17 3v18"/><path d="M3 7.5h4"/><path d="M3 12h18"/><path d="M3 16.5h4"/><path d="M17 7.5h4"/><path d="M17 16.5h4"/></svg>
                            @break
                        @default
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="8" x="2" y="2" rx="2" ry="2"/><rect width="20" height="8" x="2" y="14" rx="2" ry="2"/><line x1="6" x2="6.01" y1="6" y2="6"/><line x1="6" x2="6.01" y1="18" y2="18"/></svg>
                    @endswitch
                </span>

                <div class="min-w-0">
                    <p class="flex items-baseline gap-2">
                        <span class="text-[11px] font-semibold uppercase tracking-widest text-slate-400" aria-hidden="true">
                            {{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <span class="truncate font-heading text-sm font-semibold text-slate-900">
                            {{ data_get($service, 'title') }}
                        </span>
                    </p>
                    <p class="mt-0.5 truncate text-xs text-slate-500">
                        {{ data_get($service, 'short') }}
                    </p>
                    <p class="mt-1.5 flex flex-wrap items-center gap-2 text-[11px]">
                        <span class="rounded-full border border-teal-100 bg-teal-50 px-2 py-0.5 font-semibold text-teal-700">
                            {{ count($tiers) }} tier
                        </span>
                        @if (! empty($tiers[0]['name']))
                            <span class="font-semibold text-slate-600">{{ data_get($tiers, '0.name') }}</span>
                        @endif
                        @if (! empty($tiers[0]['price']))
                            <span class="font-semibold text-teal-700">{{ data_get($tiers, '0.price') }}</span>
                        @endif
                    </p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('admin.services.edit_one', $i) }}" class="admin-btn admin-btn-sm">
                    Edit
                </a>

                <form method="POST" action="{{ route('admin.services.tier.store', $i) }}">
                    @csrf
                    <button type="submit" class="admin-btn admin-btn-sm admin-btn-soft">+ Tier</button>
                </form>

                @foreach ($tiers as $t => $tier)
                    @if (count($tiers) > 1)
                        <form method="POST" action="{{ route('admin.services.tier.destroy', [$i, $t]) }}">
                            @csrf
                            <button type="submit" class="admin-btn admin-btn-sm admin-btn-danger" title="Hapus tier {{ data_get($tier, 'name') }}">
                                × {{ data_get($tier, 'name') }}
                            </button>
                        </form>
                    @endif
                @endforeach

                <form method="POST" action="{{ route('admin.services.destroy', $i) }}" onsubmit="return confirm('Hapus layanan {{ data_get($service, 'title') }}?')">
                    @csrf
                    <button type="submit" class="admin-btn admin-btn-sm admin-btn-danger">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="rounded-xl border border-dashed border-slate-200 bg-white/60 p-6 text-center text-sm text-slate-500">
            Belum ada layanan. Klik <span class="font-semibold text-teal-700">+ Buat layanan</span> untuk memulai.
        </div>
    @endforelse
</div>

<p class="mt-4 text-xs text-slate-500">
    Tambah / hapus <span class="font-semibold text-slate-600">strukturnya</span> di sini;
    ubah <span class="font-semibold text-slate-600">isinya</span> lewat tombol Edit.
</p>
@endsection

@section('modal-actions')
    <a href="{{ route('admin.services.create') }}" class="admin-btn">+ Buat layanan</a>
    <a href="{{ route('layanan') }}" class="admin-btn admin-btn-ghost" target="_blank">Lihat halaman</a>
@endsection
