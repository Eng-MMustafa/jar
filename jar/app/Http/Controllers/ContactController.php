<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the contact page
     */
    public function show()
    {
        return view('contact');
    }

    /**
     * Handle contact form submission
     */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Log the message for now. You may replace this with mail or DB storage.
        logger()->info('Contact form submitted', $validated + ['ip' => $request->ip()]);

        return redirect()->route('contact')->with('success', 'تم إرسال رسالتك بنجاح، سنرد عليك قريباً');
    }
}
