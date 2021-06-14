@extends('layouts.main-layout')

@section('title', 'Registration')

@section('additionalProperties')
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    <div class="authentication borderRadius whiteBg shadow">
        <form action="{{ route('user.registration') }}" method="POST">
            <h2>Registration</h2>
            @csrf
            <div class="formGroup">
                <input class="borderRadius" type="text" name="email" id="email" placeholder="Email" value=''>
                @error('email')
                <div class="error">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="formGroup">
                <input class="borderRadius" value="" type="password" name="password" id="password" placeholder="Password">
                @error('password')
                <div class="error">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="formGroup">
                <input class="borderRadius" value="" type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat password">
            </div>

            <div class="formGroup btn">
                <button class="btnCommon" type="submit" name="sendMe" value="1">Sign up</button>
            </div>

        </form>
    </div>

@endsection
