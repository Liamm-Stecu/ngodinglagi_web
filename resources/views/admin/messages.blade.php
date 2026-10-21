@extends('admin.layout')

@section('title', 'Pesan Masuk')

@section('content')
<div class="mx-auto w-full max-w-4xl space-y-6">
    <header class="mb-6 flex flex-wrap items-end justify-between gap-3">
        <div class="animate-fade-up">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-teal-700">Inbox</p>
            <h1 class="mt-1 font-heading text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Pesan Masuk</h1>
            <p class="mt-1 text-sm text-slate-500">Pesan dari form kontak di website.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="admin-btn admin-btn-ghost">← Dashboard</a>
    </header>

    @if (session('status'))
        <div class="admin-flash animate-fade-up mb-4">{{ session('status') }}</div>
    @endif

    @if ($messages->isEmpty())
        <div class="admin-card animate-rise-in text-center py-12">
            <p class="text-sm text-slate-500">Belum ada pesan masuk.</p>
        </div>
    @else
        <div class="space-y-3">
            @foreach ($messages as $message)
                <article class="admin-card animate-rise-in" style="animation-delay: {{ $loop->index * 50 }}ms">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div class="min-w-0">
                            <p class="font-heading text-base font-semibold text-slate-900">{{ $message->name }}</p>
                            <p class="mt-0.5 text-xs text-slate-500">
                                {{ $message->email ?? 'tanpa email' }}
                                <span class="mx-1.5 text-slate-300" aria-hidden="true">·</span>
                                {{ $message->created_at->translatedFormat('d M Y H:i') }}
                            </p>
                        </div>
                        <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}" onsubmit="return confirm('Hapus pesan ini?')">
                            @csrf
                            <button type="submit" class="text-xs font-medium text-red-500 hover:text-red-600 transition-colors">
                                Hapus
                            </button>
                        </form>
                    </div>
                    <p class="mt-3 whitespace-pre-wrap text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-3">{{ $message->message }}</p>
                </article>
            @endforeach
        </div>

        <div class="pt-2">
            {{ $messages->links() }}
        </div>
    @endif
</div>
@endsection
