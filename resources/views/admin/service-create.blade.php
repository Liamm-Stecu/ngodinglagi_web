@extends('admin.modal')

@section('title', 'Buat Layanan')
@section('modal-back-url', route('admin.services.edit'))
@section('modal-eyebrow', 'Layanan baru')
@section('modal-title', 'Buat Layanan')
@section('modal-subtitle', 'Isi data layanan lalu tekan Simpan.')
@section('modal-size', 'admin-modal-lg')
@section('modal-icon')
<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.services.store') }}" id="admin-edit-form" class="space-y-4">
    @csrf

    <div class="grid gap-3 sm:grid-cols-2">
        <div>
            <label class="admin-label" for="new-title">Judul</label>
            <input class="admin-input" id="new-title" name="title" value="{{ old('title') }}" placeholder="mis. Build Website" required>
        </div>
        <div>
            <label class="admin-label" for="new-short">Singkat</label>
            <input class="admin-input" id="new-short" name="short" value="{{ old('short') }}" placeholder="Ringkasan singkat layanan" required>
        </div>
    </div>

    <div>
        <label class="admin-label" for="new-description">Deskripsi</label>
        <textarea class="admin-input" id="new-description" name="description" rows="3" placeholder="Penjelasan lengkap layanan" required>{{ old('description') }}</textarea>
    </div>

    <div class="grid gap-3 sm:grid-cols-2">
        <div>
            <label class="admin-label" for="new-items">Cakupan kerja (satu per baris)</label>
            <textarea class="admin-input" id="new-items" name="items_text" rows="5" placeholder="Company profile &amp; landing page&#10;Custom fitur &amp; integrasi" required>{{ old('items_text') }}</textarea>
        </div>
        <div>
            <label class="admin-label" for="new-for">Cocok untuk (satu per baris)</label>
            <textarea class="admin-input" id="new-for" name="for_text" rows="5" placeholder="Bisnis / UMKM butuh website" required>{{ old('for_text') }}</textarea>
        </div>
    </div>

    <div class="rounded-xl border border-slate-100 bg-slate-50/80 p-3.5">
        <div class="mb-3 flex items-center justify-between gap-3">
            <span class="admin-label admin-label--flush">Harga</span>
            <div class="w-44">
                <input class="admin-input" name="pricing[label]" value="{{ old('pricing.label', 'Mulai dari') }}" placeholder="Label">
            </div>
        </div>

        <div class="grid gap-2 rounded-lg border border-slate-200/80 bg-white p-3 sm:grid-cols-[1fr_1fr_1.4fr]">
            <div>
                <label class="admin-label">Nama</label>
                <input class="admin-input" name="pricing[tiers][0][name]" value="{{ old('pricing.tiers.0.name', 'Paket A') }}" required>
            </div>
            <div>
                <label class="admin-label">Harga</label>
                <input class="admin-input" name="pricing[tiers][0][price]" value="{{ old('pricing.tiers.0.price', 'Rp 0') }}" required>
            </div>
            <div>
                <label class="admin-label">Catatan</label>
                <input class="admin-input" name="pricing[tiers][0][note]" value="{{ old('pricing.tiers.0.note') }}">
            </div>
        </div>

        <p class="mt-2 text-[11px] text-slate-500">
            Tier tambahan bisa ditambahkan dari halaman daftar layanan.
        </p>
    </div>

    <details class="rounded-xl border border-slate-100 bg-white p-3.5">
        <summary class="cursor-pointer text-xs font-semibold text-slate-500">Pengaturan lanjutan (slug)</summary>
        <div class="mt-3">
            <label class="admin-label" for="new-slug">Slug</label>
            <input class="admin-input" id="new-slug" name="slug" value="{{ old('slug') }}" placeholder="Kosongkan untuk otomatis (layanan-N)" pattern="[a-zA-Z0-9\-]*">
            <p class="mt-1 text-[11px] text-slate-500">Kosongkan saja kalau tidak perlu.</p>
        </div>
    </details>
</form>
@endsection

@section('modal-actions')
    <button type="submit" form="admin-edit-form" class="admin-btn">Simpan</button>
    <a href="{{ route('admin.services.edit') }}" class="admin-btn admin-btn-ghost">Batal</a>
@endsection
