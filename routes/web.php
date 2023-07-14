<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
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
    return to_route('chat');
});

Route::group(['prefix' => 'auth', 'controller' => AuthController::class], function () {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'registration')->name('register');
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::controller(ChatController::class)->group(function () {
    Route::get('/chat', 'index')->name('chat');
    Route::get('/messages', 'fetchMessages');
    Route::post('/messages', 'sendMessage');
});
