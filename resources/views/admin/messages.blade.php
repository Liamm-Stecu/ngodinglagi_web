@extends('admin.layout')

@section('title', 'Pesan Masuk')

@section('content')
<div class="mx-auto w-full max-w-4xl space-y-6">
    <header class="admin-card admin-card--header animate-fade-up flex flex-wrap items-end justify-between gap-4">
        <div class="min-w-0">
            <p class="admin-eyebrow">Inbox</p>
            <h1 class="mt-1 flex items-center gap-2.5 font-heading text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">
                Pesan Masuk
                <span class="rounded-full border border-teal-100 bg-teal-50 px-2.5 py-0.5 text-xs font-semibold text-teal-700">{{ $messages->total() }}</span>
            </h1>
            <p class="mt-1 text-sm text-slate-500">Pesan dari form kontak di website.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="admin-btn admin-btn-ghost">← Dashboard</a>
    </header>

    @if (session('status'))
        <div class="admin-flash animate-fade-up">{{ session('status') }}</div>
    @endif

    @if ($messages->isEmpty())
        <div class="admin-card admin-card--tall animate-rise-in flex flex-col items-center gap-3 text-center">
            <span class="admin-icon-chip size-11" aria-hidden="true">
                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                </svg>
            </span>
            <p class="text-sm font-medium text-slate-700">Belum ada pesan masuk.</p>
            <p class="max-w-sm text-xs text-slate-500">Pesan dari form kontak di halaman Kontak akan muncul di sini.</p>
        </div>
    @else
        <div class="space-y-3">
            @foreach ($messages as $message)
                <article class="admin-card admin-card--flush animate-rise-in overflow-hidden" style="animation-delay: {{ $loop->index * 50 }}ms">
                    <div class="flex items-start gap-3.5 border-l-4 border-teal-400 p-4 sm:p-5">
                        <span class="admin-avatar" aria-hidden="true">{{ substr($message->name, 0, 1) }}</span>
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-start justify-between gap-2">
                                <div class="min-w-0">
                                    <p class="font-heading text-base font-semibold text-slate-900">{{ $message->name }}</p>
                                    <p class="mt-0.5 flex flex-wrap items-center gap-x-1.5 gap-y-0.5 text-xs text-slate-500">
                                        @if ($message->email)
                                            <a href="mailto:{{ $message->email }}" class="text-teal-700 hover:underline">{{ $message->email }}</a>
                                        @else
                                            <span>tanpa email</span>
                                        @endif
                                        <span class="text-slate-300" aria-hidden="true">·</span>
                                        <span title="{{ $message->created_at->format('d/m/Y H:i') }}">{{ $message->created_at->translatedFormat('d M Y H:i') }}</span>
                                    </p>
                                </div>
                                <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}" onsubmit="return confirm('Hapus pesan ini?')">
                                    @csrf
                                    <button type="submit" class="admin-btn admin-btn-sm admin-btn-danger">Hapus</button>
                                </form>
                            </div>
                            <p class="mt-3 whitespace-pre-wrap rounded-xl bg-slate-50 px-3.5 py-3 text-sm leading-relaxed text-slate-600 ring-1 ring-slate-100">
                                {{ $message->message }}
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="pt-2">
            {{ $messages->links() }}
        </div>
    @endif
</div>
@endsection
