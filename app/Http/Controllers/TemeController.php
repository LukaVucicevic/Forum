<?php

namespace App\Http\Controllers;

use App\Models\Teme;
use App\Models\Comment;
use Illuminate\Http\Request;

class TemeController extends Controller
{
    public function index()
    {
        return view('index',['teme'=>Teme::get()]);
    }
    public function show($id)
    {
        if(auth()->check())
        {
            $tema = Teme::get()->find($id);
            $komentari=Comment::get()->where('id_teme', $id);
            return view('comment',['teme'=>$tema,'komentari'=>$komentari]);
        }
        else
        {
            return back()->withErrors('Morate biti ulogovani!','dada');
        }
        
    }
    public function store(Request $request,$id)
    {
        $formFields=$request->validate([
            'comment'=>['required','min:5'],
        ]);
        $email = auth()->user()->email;
        $name = auth()->user()->name;
        $comment=$request->input('comment');
        $comm=new Comment();
        $comm->ime=$name;
        $comm->email=$email;
        $comm->opis=$comment;
        $comm->id_teme=$id;
        $comm->save();
        return back();
    }
}
