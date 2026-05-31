<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContactUsController extends Controller
{
    public function create(): View
    {
        return view('contact-us');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'question' => ['required', 'string', 'max:2000'],
        ]);

        ContactMessage::create($validated);

        return redirect()
            ->route('contact-us.create')
            ->with('success', 'Pertanyaan berhasil dikirim.');
    }
}
