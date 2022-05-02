@extends('layout.layout')

@section('content')
    <div class="account-form">
        <div>
            <h2>Register your account</h2>
        </div>
        <form action="/register" method="POST">
            @csrf
            <div>
                <div>
                    <label for="name">Name</label>
                    <input class="input" id="name" name="name" type="text" autocomplete="name"
                           value="{{ old('name') }}" required
                           placeholder="Name">
                    @error('name')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email-address">Email address</label>
                    <input class="input" id="email-address" name="email" type="email" autocomplete="email"
                           value="{{ old('email') }}" required
                           placeholder="Email">
                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password">Password</label>
                    <input class="input" id="password" name="password" type="password" autocomplete="current-password"
                           required
                           placeholder="Password">
                    @error('password')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <button class="sign-up" type="submit" name="submit">
                    Sign Up
                </button>
            </div>
        </form>
    </div>
@endsection

