<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiTokenController extends Controller
{
    public function update(Request $request)
    {
        $token = Str::random(80); //creo il token
        //dd($request->user(), $token);
        $request->user()->forceFill([ //salviamo il token hashato
            'api_token' => hash('sha256', $token)
        ])->save();

        //la funzione return mostra il token in formato json per una sola volta 
        // return ['token' => $token];

        // Mostra il token nella sessione
        return back()->with('api_token', $token);
    }
}