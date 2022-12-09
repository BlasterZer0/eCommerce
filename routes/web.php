<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Animal;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $animals = Animal::orderBy('id', 'asc')->paginate(8);
    return view('index')->with('animals', $animals);
})->name('index');

Route::get('/info/{id}', function ($id) {
    $animal = Animal::findOrFail($id);
    return view('info')->with('animal', $animal);
})->name('info');

Auth::routes();

Route::middleware(['auth' , 'auth.session'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::resource('user', UserController::class);
    Route::resource('animal', AnimalController::class);
});