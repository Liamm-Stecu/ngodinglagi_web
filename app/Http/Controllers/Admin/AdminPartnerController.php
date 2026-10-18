<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\ConfigWriter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPartnerController extends Controller
{
    public function edit(): View
    {
        return view('admin.partner', [
            'products' => ConfigWriter::read('products'),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'affiliate_url' => ['required', 'url', 'max:255'],
            'partner' => ['required', 'string', 'max:100'],
        ]);

        ConfigWriter::write('products', $data);

        return redirect()->route('admin.partner.edit')->with('status', 'Mitra disimpan.');
    }
}
