<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Send email
        Mail::send('emails.contact', ['data' => $validated], function ($message) use ($validated) {
            $message->to('info@alnadwaarchitects.com')
                ->subject($validated['subject'])
                ->from($validated['email'], $validated['name']);
        });

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}