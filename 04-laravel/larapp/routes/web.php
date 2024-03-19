<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdoptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sayhello', function () {
    return "<h1> Hello TCO 2770672 </h1>";
});

Route::get('/pets/show', function () {
    $pets = App\Models\Pet::all();
    //echo var_dump($pets);
    dd($pets->toArray()); // Dump & Die
});


Route::get('/pets/view', function () {
    $pets = App\Models\Pet::all();
    return view('petsview')->with('pets', $pets);
});


Route::get('/users/view', function () {
    $users = App\Models\User::all();
    return view('usersview')->with('users', $users);
});

Route::get('/dashboard', function () {
    if (Auth::user()->role == 'Admin') {
        return view('dashboard-admin');
    }
    elseif (Auth::user()->role == 'Customer') {
        return view('dashboard-customer');
    } else {
        return '<h1> Not Allowed! </h1>';
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Resources
    Route::resources([
        'users'     => UserController::class,
        'pets'      => PetController::class,
        'adoptions' => AdoptionController::class
    ]);
    // Customer
    Route::get('mydata', [UserController::class, 'mydata']);
    Route::get('myadoptions', [AdoptionController::class, 'myadoptions']);
    Route::get('myadoptions/add/{id}', [AdoptionController::class, 'add']);
    Route::post('myadoptions/store', [AdoptionController::class, 'store']);


});


require __DIR__.'/auth.php';
