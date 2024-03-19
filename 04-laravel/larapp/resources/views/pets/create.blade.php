@extends('layouts.app')
@section('title', 'Create Pet Page - PetsApp')

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
<section class="register create">
    <h1>Add Pet</h1>
    <form action="{{ route('pets.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <img src="{{ asset('images/ico-upload-pet.svg') }}" id="upload" width="240px" alt="Upload">
        <input type="file" name="photo" id="photo" accept="image/*">
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
        <input type="text" name="kind" placeholder="Kind" value="{{ old('kind') }}">
        <input type="number" name="weight" placeholder="Weight" value="{{ old('weight') }}">
        <input type="number" name="age" placeholder="Age" value="{{ old('age') }}">
        <input type="text" name="breed" placeholder="Breed" value="{{ old('breed') }}">
        <input type="text" name="location" placeholder="Location" value="{{ old('location') }}">
        <button type="submit">Add</button>
    </form>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#upload').click(function (e) { 
            e.preventDefault()
            $('#photo').click()
        })

        $('#photo').change(function (e) { 
            e.preventDefault();
            let reader = new FileReader()
            reader.onload = function(event) {
                $('#upload').attr('src', event.target.result)
            }
            reader.readAsDataURL(this.files[0])
        })
    })
</script>
@if (count($errors->all()) > 0)
    @php $error = '' @endphp
    @foreach ($errors->all() as $message )
        @php $error .= '<li>' . $message . '</li>' @endphp
    @endforeach
    <script>
    $(document).ready(function () {
        Swal.fire({
            position: "top-end",
            title: "Ops!",
            html: `@php echo $error @endphp`,
            icon: "error",
            showConfirmButton: false,
            timer: 5000
        })
    })
    </script>
@endif
@endsection
