@extends('admin.modal')

@section('title', 'Tentang')
@section('modal-eyebrow', 'Edit konten')
@section('modal-title', 'Tentang')
@section('modal-subtitle', 'Statistik & bidang di halaman Tentang.')
@section('modal-icon')
<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.portfolio.update') }}" id="admin-edit-form" class="space-y-4">
    @csrf

    <div class="admin-card admin-card--compact">
        <div class="mb-3 flex items-center gap-3">
            <span class="admin-icon-chip size-9 shrink-0" aria-hidden="true">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
            </span>
            <p class="admin-section-title">Statistik proyek</p>
            <span class="ml-auto text-[11px] text-slate-400">angka di hero halaman Tentang</span>
        </div>
        <div class="grid gap-3 sm:grid-cols-2">
            <div>
                <label class="admin-label">Proyek SA-MP</label>
                <input class="admin-input" type="number" min="0" name="stats[samp]" value="{{ old('stats.samp', data_get($portfolio, 'stats.samp')) }}" required>
            </div>
            <div>
                <label class="admin-label">Proyek Website</label>
                <input class="admin-input" type="number" min="0" name="stats[web]" value="{{ old('stats.web', data_get($portfolio, 'stats.web')) }}" required>
            </div>
            <div class="sm:col-span-2">
                <label class="admin-label">Pengalaman Editing</label>
                <input class="admin-input" type="number" min="0" name="stats[editing]" value="{{ old('stats.editing', data_get($portfolio, 'stats.editing')) }}" required>
            </div>
        </div>
    </div>

    <p class="admin-section-title pt-1">Bidang / kategori</p>

    @foreach (data_get($portfolio, 'categories', []) as $i => $category)
        <fieldset class="admin-card admin-card--compact animate-rise-in space-y-3.5" style="animation-delay: {{ 100 + $i * 80 }}ms">
            <legend class="sr-only">{{ data_get($category, 'title') }}</legend>
            <div class="flex items-center gap-3">
                <span class="flex size-7 shrink-0 items-center justify-center rounded-lg bg-slate-900 text-[11px] font-bold text-teal-300" aria-hidden="true">
                    {{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}
                </span>
                <p class="admin-section-title truncate">{{ data_get($category, 'title') }}</p>
            </div>

            <input type="hidden" name="categories[{{ $i }}][slug]" value="{{ data_get($category, 'slug') }}">

            <div class="grid gap-3 sm:grid-cols-2">
                <div>
                    <label class="admin-label">Judul</label>
                    <input class="admin-input" name="categories[{{ $i }}][title]" value="{{ old("categories.$i.title", data_get($category, 'title')) }}" required>
                </div>
                <div>
                    <label class="admin-label">Deskripsi</label>
                    <input class="admin-input" name="categories[{{ $i }}][description]" value="{{ old("categories.$i.description", data_get($category, 'description')) }}" required>
                </div>
            </div>

            <div>
                <label class="admin-label">Item (satu per baris)</label>
                <textarea class="admin-input" name="categories[{{ $i }}][items_text]" rows="4" required>{{ old("categories.$i.items_text", implode("\n", data_get($category, 'items', []))) }}</textarea>
            </div>
        </fieldset>
    @endforeach
</form>

<div class="mt-5 rounded-xl border border-dashed border-slate-200 bg-white/60 p-4">
    <p class="admin-section-title mb-1">Kelola kategori</p>
    <p class="mb-3 text-xs text-slate-500">Tambah atau hapus bidang — tekan <span class="font-semibold text-teal-700">Simpan</span> setelah edit form.</p>

    <div class="space-y-2">
        <form method="POST" action="{{ route('admin.portfolio.category.store') }}">
            @csrf
            <button type="submit" class="admin-btn admin-btn-ghost w-full">+ Tambah kategori</button>
        </form>

        @foreach (data_get($portfolio, 'categories', []) as $i => $category)
            <div class="flex items-center justify-between gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5">
                <p class="flex min-w-0 items-center gap-2.5 text-sm font-medium text-slate-700">
                    <span class="flex size-6 shrink-0 items-center justify-center rounded-md bg-teal-50 text-[10px] font-bold text-teal-700" aria-hidden="true">
                        {{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}
                    </span>
                    <span class="truncate">{{ data_get($category, 'title') }}</span>
                </p>
                <form method="POST" action="{{ route('admin.portfolio.category.destroy', $i) }}" onsubmit="return confirm('Hapus kategori ini?')">
                    @csrf
                    <button type="submit" class="admin-btn admin-btn-sm admin-btn-danger">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('modal-actions')
    <button type="submit" form="admin-edit-form" class="admin-btn">Simpan</button>
    <a href="{{ route('about') }}" class="admin-btn admin-btn-ghost" target="_blank">Lihat halaman</a>
@endsection
