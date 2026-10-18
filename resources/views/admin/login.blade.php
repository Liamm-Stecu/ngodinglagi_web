@extends('admin.auth')

@section('title', 'Login')

@section('content')
<div class="flex min-h-[calc(100vh-8rem)] items-center justify-center">
    <div class="admin-card animate-rise-in w-full max-w-md overflow-hidden p-0">
        <div class="relative overflow-hidden bg-linear-to-br from-teal-800 via-teal-700 to-cyan-800 px-8 py-10 text-white">
            <div class="pointer-events-none absolute -right-10 -top-10 size-40 rounded-full bg-white/10" aria-hidden="true"></div>
            <div class="pointer-events-none absolute -bottom-14 left-8 size-32 rounded-full bg-teal-400/20" aria-hidden="true"></div>
            <div class="relative">
                <div class="flex items-center gap-3">
                    <div class="flex size-12 items-center justify-center rounded-2xl bg-white/15 backdrop-blur">
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M11 6 5 12l6 6" />
                            <path d="m14 5 5 14" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-teal-200/90">ngodinglagi</p>
                        <h1 class="font-heading text-2xl font-semibold tracking-tight">Admin panel</h1>
                    </div>
                </div>
                <p class="mt-4 text-sm text-teal-100/90">Panel konten &amp; harga — akses privat.</p>
            </div>
        </div>

        <div class="px-8 py-8">
            @if ($errors->any())
                <div class="admin-error mb-4">{{ $errors->first('password') }}</div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="password" class="admin-label">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="admin-input"
                        required
                        autofocus
                        autocomplete="current-password"
                        placeholder="••••••••"
                    >
                </div>
                <button type="submit" class="admin-btn w-full">
                    Masuk panel
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </button>
            </form>

            <p class="mt-6 text-center text-xs text-slate-400">
                <a href="{{ route('home') }}" class="transition hover:text-teal-700">← Kembali ke website</a>
            </p>
        </div>
    </div>
</div>
@endsection
