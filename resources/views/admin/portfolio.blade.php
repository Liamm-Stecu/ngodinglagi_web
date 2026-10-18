@extends('admin.layout')

@section('title', 'Portofolio')

@section('content')
<div class="mx-auto w-full max-w-3xl">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div class="animate-fade-up">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-teal-700">Panel</p>
            <h1 class="mt-1 font-heading text-2xl font-semibold tracking-tight text-slate-900">Portofolio</h1>
            <p class="mt-1 text-sm text-slate-500">Edit statistik dan kategori proyek.</p>
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

    <form method="POST" action="{{ route('admin.portfolio.update') }}" class="space-y-4">
        @csrf

        <div class="admin-card grid gap-3 sm:grid-cols-2">
            <div>
                <label class="admin-label">Proyek SA-MP</label>
                <input class="admin-input" type="number" min="0" name="stats[samp]" value="{{ old('stats.samp', data_get($portfolio, 'stats.samp')) }}" required>
            </div>
            <div>
                <label class="admin-label">Proyek Website</label>
                <input class="admin-input" type="number" min="0" name="stats[web]" value="{{ old('stats.web', data_get($portfolio, 'stats.web')) }}" required>
            </div>
        </div>

        @foreach (data_get($portfolio, 'categories', []) as $i => $category)
            <fieldset class="admin-card space-y-3">
                <legend class="px-2 font-heading text-sm font-semibold text-teal-700">
                    {{ data_get($category, 'title') }}
                </legend>

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

        <div class="flex gap-3">
            <button type="submit" class="admin-btn">Simpan</button>
            <a href="{{ route('portofolio') }}" class="admin-btn admin-btn-ghost" target="_blank">Lihat halaman</a>
        </div>
    </form>
</div>
@endsection
