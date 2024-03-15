@extends('layouts.app')
@section('title', 'Users Page - PetsApp')

@section('content')
<header class="nav level-2">
    <a href="{{ route('dashboard') }}">
        <img src="{{ asset('images/ico-back.svg') }}" alt="Back">
    </a>
    <img src="{{ asset('images/logo.svg') }}" alt="Logo">
    <a href="javascript:;" class="mburger">
        <img src="{{ asset('images/mburger.svg') }}" alt="Menu Burger">
    </a>
</header>
<section class="module">
    <h1>Module Users</h1>
    <a class="add" href="{{ url('users/create') }}">
        <img src="{{ asset('images/ico-add.svg') }}" width="30px" alt="Add">
        Add User
    </a>
    <table>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>
                    <img src="{{ asset('images/'.$user->photo) }}" alt="User">
                </td>
                <td>
                    <span>{{ $user->fullname }}</span>
                    <span>{{ $user->role }}</span>
                </td>
                <td>
                    <a href="{{ url('users/' . $user->id) }}" class="show">
                        <img src="{{ asset('images/ico-show.svg') }}" alt="Show">
                    </a>
                    <a href="{{ url('users/' . $user->id . '/edit') }}" class="edit">
                        <img src="{{ asset('images/ico-edit.svg') }}" alt="Edit">
                    </a>
                    <a href="javascript:;" class="delete" data-id="{{ $user->id }}">
                        <img src="{{ asset('images/ico-delete.svg') }}" alt="Delete">
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    {{ $users->links('layouts.paginator') }}
                    {{-- {{ $users->links() }} --}}
                </td>
            </tr>
        </tfoot>
    </table>
</section>
@endsection

@section('js')
    @if (session('message'))
        <script>
        $(document).ready(function () {
            Swal.fire({
                position: "top-end",
                title: "Great job!",
                text: "{{ session('message') }}",
                icon: "success",
                showConfirmButton: false,
                timer: 5000
            })
        })
        </script>
    @endif
@endsection