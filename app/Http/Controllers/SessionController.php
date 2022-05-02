<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Wrong credentials provided.']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
