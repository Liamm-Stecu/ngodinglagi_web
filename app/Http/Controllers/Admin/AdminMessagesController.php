<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminMessagesController extends Controller
{
    public function index(Request $request): View
    {
        $messages = ContactMessage::orderByDesc('created_at')
            ->paginate(20);

        return view('admin.messages', [
            'messages' => $messages,
        ]);
    }

    public function destroy(Request $request, int $id): RedirectResponse
    {
        ContactMessage::findOrFail($id)->delete();

        return back()->with('status', 'Pesan dihapus.');
    }
}
