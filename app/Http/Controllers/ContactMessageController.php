<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function create(): View
    {
        return view('kontak', [
            'faq' => config('content.faq', []),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'message.required' => 'Pesan wajib diisi.',
            'message.min' => 'Pesan minimal 10 karakter.',
            'email.email' => 'Format email tidak valid.',
        ]);

        ContactMessage::create($validated);

        return redirect()
            ->route('kontak')
            ->with('contact_success', 'Pesan terkirim! Kami akan balas secepatnya lewat email atau WhatsApp.');
    }
}
