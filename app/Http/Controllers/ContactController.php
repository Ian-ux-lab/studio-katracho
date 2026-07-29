<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        Mail::to('fa2288050@gmail.com')->send(new ContactMail($validated));

        return back()->with('success', '¡Mensaje enviado! Te contactaremos pronto.');
    }
}
