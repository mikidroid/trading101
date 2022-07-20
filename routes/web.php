<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Invest;
use App\Http\Controllers\Trade;
use App\Http\Controllers\MyLottery;
use App\Http\Controllers\Transactions;
use App\Http\Controllers\Notifications;
use App\Http\Controllers\Profile;
use App\Http\Controllers\Admin\Dashboard;
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



//Guest
Route::group([],function (){
  Route::get('/', function () {
    return Inertia::render('home/guest');
  })->name('/')->middleware('guest');
  Route::get('verify-account/confirm/{email}',[HomeController::class,'VerifyAccount'])->name('verify.account');
  Route::resource('trade',Trade::class);
  Route::resource('lottery',MyLottery::class);
  Route::post('deposit/callback',[Transactions::class,'DepositCallback'])->name('deposit.callback');
});

//User
Route::group(['middleware'=>'userAuth'],function (){
  Route::get('home', [HomeController::class, 'index'])->name('home');
  Route::resource('notifications',Notifications::class);
  Route::resource('investment',Invest::class);
  Route::resource('profile',Profile::class);
  Route::resource('transactions',Transactions::class);
  Route::get('deposit',[Transactions::class,'deposit'])->name('deposit');
  Route::post('deposit/store',[Transactions::class,'DepositStore'])->name('deposit.store');
  Route::get('deposit/fail',[Transactions::class,'fail_url'])->name('deposit.fail');
  Route::get('deposit/success',[Transactions::class,'success_url'])->name('deposit.success');
  Route::get('transaction/delete/{id}',[Transactions::class,'destroy'])->name('transaction.delete');
  Route::get('withdrawal',[Transactions::class,'withdrawal'])->name('withdrawal');
  Route::post('withdrawal/store',[Transactions::class,'WithdrawalStore'])->name('withdrawal.store');
  Route::get('lottery-claim/{id}',[MyLottery::class,'ClaimLottery'])->name('lottery.claim');
});

//Admin
Route::group(['middleware'=>'adminAuth','prefix'=>'admin'],function (){
 
Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
Route::get('deposits',[Dashboard::class,'DepositsAdmin'])->name('deposits.admin');
Route::get('transaction/confirm/{id}',[Transactions::class,'TransactionConfirm'])->name('transaction.confirm');
Route::get('transaction/delete/{id}',[Transactions::class,'destroy'])->name('transaction.delete');
Route::get('withdrawal/reject/{id}',[Transactions::class,'WithdrawalRejected'])->name('withdrawal.reject');
});

// crons
Route::get('invest-cron',[Invest::class,'InvestCron'])->name('invest.cron');
Route::get('lottery-cron',[MyLottery::class,'LotteryCron'])->name('lottery.cron');






require __DIR__.'/auth.php';
