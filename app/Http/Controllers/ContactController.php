<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMessage;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'message' => 'required|string'
        ]);

        Mail::to('your-email@example.com')
            ->queue(new ContactFormMessage($validated));

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
