<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('registration');
    }
    public function store(Request $request)
    {
        $formFields=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::Unique('users','email')],
            'password'=>['required','confirmed','min:8']
        ]);
        $formFields['password']=bcrypt($formFields['password']);
        $user=User::create($formFields);
        auth()->login($user);
        return redirect('/');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function login()
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $formFields=$request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        if(auth()->attempt($formFields))
        {
            $request->session()->regenerate();
            return redirect('/');
        }
        return redirect('/login')->withErrors(['email'=>'Pogresan unos'])->onlyInput('email');
    }
}
