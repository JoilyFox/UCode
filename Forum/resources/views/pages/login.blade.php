@extends('layouts.main-layout')

@section('title', 'Login')

@section('additionalProperties')
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    <div class="authentication borderRadius whiteBg shadow">
        <form action="{{ route('user.login') }}" method="POST">
            <h2>Login</h2>
            @csrf
            <div class="formGroup">
                <input class="borderRadius" type="text" name="email" id="email" placeholder="Email">
                @error('email')
                <div class="error">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="formGroup">
                <input class="borderRadius" type="password" name="password" id="password" placeholder="Password">
                @error('password')
                <div class="error">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="formGroup btn">
                <button class="btnCommon" type="submit" name="sendMe" value="1">Sign in</button>
            </div>

        </form>
    </div>

@endsection
