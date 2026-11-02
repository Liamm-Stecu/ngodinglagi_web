@extends('admin.modal')

@section('title', 'Kontak')
@section('modal-eyebrow', 'Edit konten')
@section('modal-title', 'Kontak')
@section('modal-subtitle', 'Kanal kontak yang tampil di website.')
@section('modal-icon')
<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.contact.update') }}" id="admin-edit-form" class="space-y-4">
    @csrf

    <fieldset class="admin-card admin-card--compact space-y-3.5">
        <legend class="sr-only">WhatsApp</legend>
        <div class="flex items-center gap-3">
            <span class="admin-icon-chip size-9 shrink-0" aria-hidden="true">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </span>
            <div>
                <p class="admin-eyebrow">Kanal utama</p>
                <p class="admin-section-title">WhatsApp</p>
            </div>
            <span class="ml-auto rounded-full border border-teal-100 bg-teal-50 px-2.5 py-1 text-[11px] font-semibold text-teal-700">paling cepat</span>
        </div>
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

    <fieldset class="admin-card admin-card--compact space-y-3.5">
        <legend class="sr-only">Instagram</legend>
        <div class="flex items-center gap-3">
            <span class="admin-icon-chip size-9 shrink-0" aria-hidden="true">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
            </span>
            <p class="admin-section-title">Instagram</p>
        </div>
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

    <fieldset class="admin-card admin-card--compact space-y-3.5">
        <legend class="sr-only">Discord</legend>
        <div class="flex items-center gap-3">
            <span class="admin-icon-chip size-9 shrink-0" aria-hidden="true">
                <svg class="size-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/></svg>
            </span>
            <p class="admin-section-title">Discord</p>
            <span class="ml-auto text-[11px] font-medium text-slate-400">fitur salin username</span>
        </div>
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
</form>
@endsection

@section('modal-actions')
    <button type="submit" form="admin-edit-form" class="admin-btn">Simpan</button>
    <a href="{{ route('kontak') }}" class="admin-btn admin-btn-ghost" target="_blank">Lihat halaman</a>
@endsection
