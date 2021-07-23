<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Mail\ContactFormMarkdown;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function form()
    {
        return view('guests.contacts');
    }
    public function storeAndSend(Request $request)
    {
        //ddd($request->all());

        $validateData = $request->validate([
            'full_name' => 'required',
            'email' => 'required | email',
            'message' => 'required'
        ]);

        $contact = Contact::create($validateData); //salvo in DB
        //return (new ContactFormMarkdown($contact))->render();

        //ddd($validateData);

        //return (new ContactFormMail($validateData))->render(); //la indirizzo a schermo per vedere la mail, non la invio

        Mail::to('admin@test.com')->send(new ContactFormMarkdown($contact));

        return redirect()->back()->with('message', 'Successo! Grazie per la tua email, ti risponderemo il prima possibile!');
    }
}