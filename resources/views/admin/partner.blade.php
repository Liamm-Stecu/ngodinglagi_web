@extends('admin.modal')

@section('title', 'Mitra')
@section('modal-eyebrow', 'Edit konten')
@section('modal-title', 'Mitra')
@section('modal-subtitle', 'Link affiliate Wide Host Media.')
@section('modal-icon')
<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.partner.update') }}" id="admin-edit-form" class="space-y-4">
    @csrf

    <div class="admin-card admin-card--compact space-y-4">
        <div class="flex items-center gap-3">
            <span class="admin-icon-chip size-9 shrink-0" aria-hidden="true">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
            </span>
            <div>
                <p class="admin-eyebrow">Affiliate</p>
                <p class="admin-section-title">Paket hosting mitra</p>
            </div>
        </div>

        <div>
            <label class="admin-label">Nama mitra</label>
            <input class="admin-input" name="partner" value="{{ old('partner', data_get($products, 'partner')) }}" required>
        </div>

        <div>
            <label class="admin-label">URL affiliate</label>
            <input class="admin-input" type="url" name="affiliate_url" value="{{ old('affiliate_url', data_get($products, 'affiliate_url')) }}" required>
            <p class="mt-1.5 text-xs text-slate-400">Dipakai di kartu rekomendasi hosting halaman beranda.</p>
        </div>
    </div>
</form>
@endsection

@section('modal-actions')
    <button type="submit" form="admin-edit-form" class="admin-btn">Simpan</button>
    <a href="{{ route('home') }}" class="admin-btn admin-btn-ghost" target="_blank">Lihat website</a>
@endsection
