<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmailController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/emails/create', [EmailController::class, 'create'])->name('emails.create');
Route::post('/emails', [EmailController::class, 'store'])->name('emails.store');

Route::get('/emails/edit/{email}', [EmailController::class, 'edit'])->name('emails.edit');
Route::put('/emails/{email}', [EmailController::class, 'update'])->name('emails.update');
Route::delete('/emails/{email}', [EmailController::class, 'destroy'])->name('emails.delete');


