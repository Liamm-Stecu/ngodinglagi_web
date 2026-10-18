<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\ConfigWriter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminContactController extends Controller
{
    public function edit(): View
    {
        return view('admin.contact', [
            'contact' => ConfigWriter::read('contact'),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'whatsapp.label' => ['required', 'string', 'max:50'],
            'whatsapp.display' => ['required', 'string', 'max:50'],
            'whatsapp.url' => ['required', 'url', 'max:255'],
            'instagram.label' => ['required', 'string', 'max:50'],
            'instagram.display' => ['required', 'string', 'max:50'],
            'instagram.url' => ['required', 'url', 'max:255'],
            'discord.label' => ['required', 'string', 'max:50'],
            'discord.display' => ['required', 'string', 'max:50'],
        ]);

        $data['discord']['url'] = null;

        ConfigWriter::write('contact', $data);

        return redirect()->route('admin.contact.edit')->with('status', 'Kontak disimpan.');
    }
}
