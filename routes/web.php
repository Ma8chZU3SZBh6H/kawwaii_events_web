<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Mail\RegistrationMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

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

//dd((new Carbon('2022/02/05'))->diffForHumans(['short' => true]));

Route::get('/email', function () {
    return new RegistrationMail("test", "test");
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{sort?}', [HomeController::class, 'index'])->where('sort', "(title|starts)");

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/register/{data}', [RegisterController::class, 'confirm'])->name('register.confirm');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/dashboard/joined', [DashboardController::class, 'select'])->name('dashboard.joined');
Route::get('/dashboard/joined/{sort}', [DashboardController::class, 'select'])->where('sort', "(title|starts)");
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/{sort}', [DashboardController::class, 'index'])->where('sort', "(title|starts)");


Route::post('/join/guest/{event}', [JoinController::class, 'join_guest_send'])->name('join.guest');
Route::post('/join/event/{event}', [JoinController::class, 'join_auth_store'])->name('join.auth.accept');
Route::post('/join/event/leave/{event}', [JoinController::class, 'join_auth_destroy'])->name('join.auth.leave');
Route::post('/join/event/remove/{event}', [JoinController::class, 'join_auth_destroy'])->name('join.auth.remove');
Route::get('/join/guest/accept/{data}', [JoinController::class, 'join_guest_store'])->name('join.guest.accept');

Route::get('/event/add', [EventController::class, 'index'])->name('event');
Route::post('/event/add', [EventController::class, 'store']);
Route::get('/event/edit/{event}', [EventController::class, 'edit_get'])->name('event.edit');
Route::post('/event/edit/{event}', [EventController::class, 'edit_post']);
Route::delete('/event/delete/{event}', [EventController::class, 'destroy'])->name('event.delete');
Route::get('/event/{event}', [EventController::class, 'select'])->name('event.select');
