@extends('layouts.app')
@section('title', 'Show Pet Page - PetsApp')

@section('content')
<header class="nav level-2">
    <a href="{{ url('pets') }}">
        <img src="{{ asset('images/ico-back.svg') }}" alt="Back">
    </a>
    <img src="{{ asset('images/logo.svg') }}" alt="Logo">
    <a href="javascript:;" class="mburger">
        <img src="{{ asset('images/mburger.svg') }}" alt="Menu Burger">
    </a>
</header>
<section class="show">
    <h1>Show Pet</h1>
    <img src="{{ asset('images/'.$pet->photo) }}" class="photo" alt="Photo">
    <div class="info">
        <p>{{ $pet->name }}</p>
        <p>{{ $pet->kind }}</p>
        <p>{{ $pet->weight }} Kls</p>
        <p>{{ $pet->age }} Years</p>
        <p>{{ $pet->breed }}</p>
        <p>{{ $pet->location }}</p>
    </div>
</section>

@endsection