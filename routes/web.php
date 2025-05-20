<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/insecure-login', function () {
    return view('insecure-login');
})->name('insecure-login');

Route::post('/insecure-login', function (Request $request) {
    
    $email = $request->input('email');
    $password = $request->input('password');
    
    
    $user = DB::select("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    if ($user) {
        Session::put('user', (object) $user[0]);
        return redirect('/insecure-welcome');
    }

    return back()->withErrors(['login' => 'Invalid credentials']);
});

Route::get('/insecure-welcome', function (Request $request) {
    if (!Session::has('user')) {
        return Redirect::to('/insecure-login')->send();
    }
    return view('insecure-welcome');
})->name('insecure-welcome');

require __DIR__.'/auth.php';
