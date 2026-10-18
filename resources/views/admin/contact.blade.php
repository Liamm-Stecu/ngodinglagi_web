@extends('admin.layout')

@section('title', 'Kontak')

@section('content')
<div class="mx-auto w-full max-w-3xl">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div class="animate-fade-up">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-teal-700">Panel</p>
            <h1 class="mt-1 font-heading text-2xl font-semibold tracking-tight text-slate-900">Kontak</h1>
            <p class="mt-1 text-sm text-slate-500">Edit kanal kontak yang tampil di website.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="admin-btn admin-btn-ghost">← Dashboard</a>
    </div>

    @if (session('status'))
        <div class="admin-flash mb-4">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.contact.update') }}" class="admin-card animate-rise-in space-y-5">
        @csrf

        <fieldset class="space-y-3">
            <legend class="font-heading text-sm font-semibold text-slate-900">WhatsApp</legend>
            <div class="grid gap-3 sm:grid-cols-2">
                <div>
                    <label class="admin-label" for="wa_label">Label</label>
                    <input class="admin-input" id="wa_label" name="whatsapp[label]" value="{{ old('whatsapp.label', data_get($contact, 'whatsapp.label')) }}" required>
                </div>
                <div>
                    <label class="admin-label" for="wa_display">Tampilan</label>
                    <input class="admin-input" id="wa_display" name="whatsapp[display]" value="{{ old('whatsapp.display', data_get($contact, 'whatsapp.display')) }}" required>
                </div>
            </div>
            <div>
                <label class="admin-label" for="wa_url">URL</label>
                <input class="admin-input" id="wa_url" name="whatsapp[url]" type="url" value="{{ old('whatsapp.url', data_get($contact, 'whatsapp.url')) }}" required>
            </div>
        </fieldset>

        <fieldset class="space-y-3 border-t border-slate-100 pt-5">
            <legend class="font-heading text-sm font-semibold text-slate-900">Instagram</legend>
            <div class="grid gap-3 sm:grid-cols-2">
                <div>
                    <label class="admin-label" for="ig_label">Label</label>
                    <input class="admin-input" id="ig_label" name="instagram[label]" value="{{ old('instagram.label', data_get($contact, 'instagram.label')) }}" required>
                </div>
                <div>
                    <label class="admin-label" for="ig_display">Tampilan</label>
                    <input class="admin-input" id="ig_display" name="instagram[display]" value="{{ old('instagram.display', data_get($contact, 'instagram.display')) }}" required>
                </div>
            </div>
            <div>
                <label class="admin-label" for="ig_url">URL</label>
                <input class="admin-input" id="ig_url" name="instagram[url]" type="url" value="{{ old('instagram.url', data_get($contact, 'instagram.url')) }}" required>
            </div>
        </fieldset>

        <fieldset class="space-y-3 border-t border-slate-100 pt-5">
            <legend class="font-heading text-sm font-semibold text-slate-900">Discord</legend>
            <div class="grid gap-3 sm:grid-cols-2">
                <div>
                    <label class="admin-label" for="dc_label">Label</label>
                    <input class="admin-input" id="dc_label" name="discord[label]" value="{{ old('discord.label', data_get($contact, 'discord.label')) }}" required>
                </div>
                <div>
                    <label class="admin-label" for="dc_display">Username (disalin)</label>
                    <input class="admin-input" id="dc_display" name="discord[display]" value="{{ old('discord.display', data_get($contact, 'discord.display')) }}" required>
                </div>
            </div>
        </fieldset>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="admin-btn">Simpan</button>
            <a href="{{ route('kontak') }}" class="admin-btn admin-btn-ghost" target="_blank">Lihat halaman</a>
        </div>
    </form>
</div>
@endsection
