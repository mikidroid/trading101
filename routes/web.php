<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Invest;
use App\Http\Controllers\Trade;
use App\Http\Controllers\Lottery;
use App\Http\Controllers\Transactions;
use App\Http\Controllers\Profile;
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


Route::resource('trade',Trade::class);
Route::resource('lottery',Lottery::class);
Route::resource('investment',Invest::class);
Route::resource('profile',Profile::class);
Route::resource('transactions',Transactions::class);
Route::get('deposit',[Transactions::class,'deposit'])->name('deposit');
Route::get('withdrawal',[Transactions::class,'withdrawal'])->name('withdrawal');
Route::post('callback',[Transactions::class,'depositCallback'])->name('callback');
Route::get('home', [HomeController::class, 'index'])->name('home');


require __DIR__.'/auth.php';
