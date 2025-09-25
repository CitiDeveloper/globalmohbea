<?php
// app/Http/Controllers/NewsletterController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        $subscriber = NewsletterSubscriber::create([
            'email' => $request->email,
        ]);

        // Send confirmation email
        Mail::to($subscriber->email)->send(new \App\Mail\NewsletterSubscribed());

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}
