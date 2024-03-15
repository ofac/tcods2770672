<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$users = User::all();
        //$users = User::simplePaginate(10);
        //$users = User::latest()->get();
        $users = User::paginate(10);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'document'  => ['required', 'numeric', 'unique:'.User::class],
            'fullname'  => ['required', 'string', 'max:64'],
            'gender'    => ['required'],
            'birthdate' => ['required', 'date'],
            'photo'     => ['required', 'image'],
            'phone'     => ['required'],
            'email'     => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password'  => ['required', 'confirmed'],
        ]);

        if ($validated) {
            // Upload File
            if ($request->hasFile('photo')) {
                $photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
            }
    
            $user = User::create([
                'document'  => $request->document,
                'fullname'  => $request->fullname,
                'gender'    => $request->gender,
                'birthdate' => $request->birthdate,
                'photo'     => $photo,
                'phone'     => $request->phone,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
            ]);

            if ($user) {
                return redirect('users')->with('message', 'The user: '.$request->fullname.' was successfully added!');
            }

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        dd($user->toArray());
        //return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
