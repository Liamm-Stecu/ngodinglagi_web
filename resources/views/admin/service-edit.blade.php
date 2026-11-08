@extends('admin.modal')

@section('title', 'Edit Layanan')
@section('modal-back-url', route('admin.services.edit'))
@section('modal-eyebrow', 'Edit layanan')
@section('modal-title', strip_tags($service['title']))
@section('modal-subtitle', 'Ubah data layanan ini lalu tekan Simpan.')
@section('modal-size', 'admin-modal-lg')
@section('modal-icon')
<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.services.update', $index) }}" id="admin-edit-form" class="space-y-4">
    @csrf
    <input type="hidden" name="slug" value="{{ data_get($service, 'slug') }}">

    <div class="grid gap-3 sm:grid-cols-2">
        <div>
            <label class="admin-label" for="svc-title">Judul</label>
            <input class="admin-input" id="svc-title" name="title" value="{{ old('title', data_get($service, 'title')) }}" required>
        </div>
        <div>
            <label class="admin-label" for="svc-short">Singkat</label>
            <input class="admin-input" id="svc-short" name="short" value="{{ old('short', data_get($service, 'short')) }}" required>
        </div>
    </div>

    <div>
        <label class="admin-label" for="svc-description">Deskripsi</label>
        <textarea class="admin-input" id="svc-description" name="description" rows="3" required>{{ old('description', data_get($service, 'description')) }}</textarea>
    </div>

    <div class="grid gap-3 sm:grid-cols-2">
        <div>
            <label class="admin-label" for="svc-items">Cakupan kerja (satu per baris)</label>
            <textarea class="admin-input" id="svc-items" name="items_text" rows="5" required>{{ old('items_text', implode("\n", data_get($service, 'items', []))) }}</textarea>
        </div>
        <div>
            <label class="admin-label" for="svc-for">Cocok untuk (satu per baris)</label>
            <textarea class="admin-input" id="svc-for" name="for_text" rows="5" required>{{ old('for_text', implode("\n", data_get($service, 'for', []))) }}</textarea>
        </div>
    </div>

    <div class="rounded-xl border border-slate-100 bg-slate-50/80 p-3.5">
        <div class="mb-3 flex items-center justify-between gap-3">
            <span class="admin-label admin-label--flush">Harga</span>
            <div class="w-44">
                <input class="admin-input" name="pricing[label]" value="{{ old('pricing.label', data_get($service, 'pricing.label', 'Mulai dari')) }}" placeholder="Label">
            </div>
        </div>

        @foreach (data_get($service, 'pricing.tiers', []) as $t => $tier)
            <div class="mb-2.5 grid gap-2 rounded-lg border border-slate-200/80 bg-white p-3 sm:grid-cols-[1fr_1fr_1.4fr] last:mb-0">
                <div>
                    <label class="admin-label">Nama</label>
                    <input class="admin-input" name="pricing[tiers][{{ $t }}][name]" value="{{ old("pricing.tiers.$t.name", data_get($tier, 'name')) }}" required>
                </div>
                <div>
                    <label class="admin-label">Harga</label>
                    <input class="admin-input" name="pricing[tiers][{{ $t }}][price]" value="{{ old("pricing.tiers.$t.price", data_get($tier, 'price')) }}" required>
                </div>
                <div>
                    <label class="admin-label">Catatan</label>
                    <input class="admin-input" name="pricing[tiers][{{ $t }}][note]" value="{{ old("pricing.tiers.$t.note", data_get($tier, 'note')) }}">
                </div>
            </div>
        @endforeach

        <p class="mt-1 text-[11px] text-slate-500">
            Tambah / hapus tier diatur dari halaman daftar layanan.
        </p>
    </div>
</form>
@endsection

@section('modal-actions')
    <button type="submit" form="admin-edit-form" class="admin-btn">Simpan</button>
    <a href="{{ route('admin.services.edit') }}" class="admin-btn admin-btn-ghost">Kembali</a>
    <a href="{{ route('layanan') }}" class="admin-btn admin-btn-ghost" target="_blank">Lihat halaman</a>
@endsection
