@extends('admin.layout')

@section('title', 'Mitra')

@section('content')
<div class="mx-auto w-full max-w-xl">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div class="animate-fade-up">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-teal-700">Panel</p>
            <h1 class="mt-1 font-heading text-2xl font-semibold tracking-tight text-slate-900">Mitra</h1>
            <p class="mt-1 text-sm text-slate-500">Edit link affiliate Wide Host Media.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="admin-btn admin-btn-ghost">← Dashboard</a>
    </div>

    @if (session('status'))
        <div class="admin-flash mb-4">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.partner.update') }}" class="admin-card space-y-4">
        @csrf

        <div>
            <label class="admin-label">Nama mitra</label>
            <input class="admin-input" name="partner" value="{{ old('partner', data_get($products, 'partner')) }}" required>
        </div>

        <div>
            <label class="admin-label">URL affiliate</label>
            <input class="admin-input" type="url" name="affiliate_url" value="{{ old('affiliate_url', data_get($products, 'affiliate_url')) }}" required>
        </div>

        <div class="flex gap-3 pt-1">
            <button type="submit" class="admin-btn">Simpan</button>
            <a href="{{ route('home') }}#promosi" class="admin-btn admin-btn-ghost" target="_blank">Lihat strip</a>
        </div>
    </form>
</div>
@endsection
