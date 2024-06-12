<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
Route::get('/welcome', function () {
    return view('welcome');
})->name('home');

//Route::get('/event', function () {
//    return view('event');
//})->name('event');

Route::get( '/login', [AuthManager::class, 'login'])->name('login');
Route::post( '/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get( '/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post( '/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('logout', [AuthManager::class, 'logout'])->name('logout');

//Route::get( '/event', [AuthManager::class, 'event'])->name('event');
////Route::resource('events', App\Http\Controllers\EventController::class)->name('events');
//Route::resource('events', AuthManager::class)->name('events');

Route::get('/index', function () {
    return view('index');
})->name('index');
