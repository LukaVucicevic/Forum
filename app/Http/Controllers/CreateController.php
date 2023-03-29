<?php

namespace App\Http\Controllers;

use App\Models\Teme;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function show()
    {
        return view('napravi');
    }
    public function store(Request $request)
    {
        $formFields=$request->validate([
            'ime'=>['required'],
            'comment'=>['required','min:10'],
        ]);
        $email = auth()->user()->email;
        $name = auth()->user()->name;
        $ime=$request->input('ime');
        $comment=$request->input('comment');
        $tema=new Teme();
        $tema->naziv=$ime;
        $tema->ime=$name;
        $tema->autor=$email;
        $tema->opis=$comment;
        $tema->save();
        return back();
    }
}
