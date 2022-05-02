<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
                'name' => ['required', 'min:3', 'max:255', 'unique:users,name'],
                'email' => ['required', 'email','max:255', 'unique:users,email'],
                'password' => ['required', 'min:8', 'max:255']
            ]
        );

        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/');
    }
}
