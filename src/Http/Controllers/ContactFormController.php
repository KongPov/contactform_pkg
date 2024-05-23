<?php

namespace YourNamespace\ContactForm\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use YourNamespace\ContactForm\Models\Contact;

class ContactFormController extends Controller
{
    public function showForm()
    {
        return view('contactform::form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('contact.thankyou');
    }

    public function thankYou()
{
    return view('contactform::thankyou')->with('message', 'Thank you for your message!');
}

public function listContacts()
{
    $contacts = Contact::all();
    return view('contactform::admin.contacts', compact('contacts'));
}
}
