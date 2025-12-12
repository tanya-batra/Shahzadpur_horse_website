<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Mail\ContactUserMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
   public function index()
    {
        return view('contact');
    }

 public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'message' => 'required|string',
    ]);

    $contact = Contact::create($request->all());

   
    Mail::to('tanyabatra949@gmail.com')->send(new ContactFormMail($contact));

    Mail::to($contact->email)->send(new ContactUserMail($contact));

    return redirect()->back()->with('success', 'Your message has been sent successfully!');
}
}
