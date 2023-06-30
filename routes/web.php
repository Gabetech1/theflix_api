<?php

use App\Models\User;
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

Route::get('/admin-create', function () {
    User::create([
        'name' => 'Gabe',
        'email' => 'gabrielabk1@gmail.com',
        'password' => '0546747672'
    ]);

   User::create([
        'name' => 'Flix',
        'email' => 'info@flixshipping.com',
        'password' => 'Flix@Ship23'
    ]);
});