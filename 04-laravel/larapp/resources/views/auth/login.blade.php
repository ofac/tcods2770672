@extends('layouts.app')

@section('title', 'Login Page - PetsApp')

@section('content')
<header>
    <img src="{{ asset('images/logo.svg') }}" alt="Logo">
</header>
<section class="login">
    <menu>
        <a href="javascript:;">Login</a>
        <a href="{{ url('register/') }}">Register</a>
    </menu>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</section>    
@endsection