<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('guests.welcome');
    }
    public function about()
    {
        return view('guests.about');
    }
    public function contacts()
    {
        return view('guests.contacts');
    }
    public function sendForm(Request $request)
    {
        //ddd($request->all());

        $validateData = $request->validate([
            'full_name' => 'required',
            'email' => 'required | email',
            'message' => 'required'
        ]);

        //ddd($validateData);

        //return (new ContactFormMail($validateData))->render(); //la indirizzo a schermo per vedere la mail, non la invio

        Mail::to('admin@test.com')->send(new ContactFormMail($validateData));

        return redirect()->back()->with('message', 'Successo! Grazie per la tua email, ti risponderemo il prima possibile!');
    }
}