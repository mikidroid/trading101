<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Deposit;
use App\Http\Controllers\Withdrawal;
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
    return Inertia::render('home/home');
})->name('/');

Route::resource('deposit',Deposit::class);
Route::resource('withdrawal', Withdrawal::class);
Route::get('home', [HomeController::class, 'index'])->name('home');


require __DIR__.'/auth.php';
