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
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\InstallScript;
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
//installScript
Route::get('step1',[InstallScript::class,'Step1']);
Route::get('step2',[InstallScript::class,'Step2']);
Route::get('step3',[InstallScript::class,'Step3']);
Route::get('step4',[InstallScript::class,'Step4']);
Route::post('step1/store',[InstallScript::class,'Step1Store']);
Route::post('step2/store',[InstallScript::class,'Step2Store']);
Route::post('step3/store',[InstallScript::class,'Step3Store']);
Route::post('step4/store',[InstallScript::class,'Step4Store']);

//Guest
Route::group([],function (){
  //guest check for install script
  Route::get('/', function () {
    if(env('SETUP_STATUS') == 0){
       return redirect('step1');}
    return Inertia::render('home/guest');
  })->name('/')->middleware('guest');
  
  Route::get('verify-account/confirm/{email}',[HomeController::class,'VerifyAccount'])->name('verify.account');
  Route::resource('trade',Trade::class);
  Route::resource('lottery',MyLottery::class);
  Route::post('deposit/callback',[Transactions::class,'DepositCallback'])->name('deposit.callback');
});

//User
Route::group(['middleware'=>['auth','userAuth']],function (){
  Route::get('home', [HomeController::class, 'index'])->name('home');
  Route::resource('notifications',Notifications::class);
  Route::resource('investment',Invest::class);
  Route::resource('profile',Profile::class);
  Route::resource('transactions',Transactions::class);
  Route::get('deposit',[Transactions::class,'deposit'])->name('deposit');
  Route::post('deposit/store',[Transactions::class,'DepositStore_Coinbase'])->name('deposit.store');
  Route::get('deposit/fail',[Transactions::class,'fail_url'])->name('deposit.fail');
  Route::get('deposit/success',[Transactions::class,'success_url'])->name('deposit.success');
  Route::get('transaction/delete/{id}',[Transactions::class,'destroy'])->name('transaction.delete');
  Route::get('withdrawal',[Transactions::class,'withdrawal'])->name('withdrawal');
  Route::post('withdrawal/store',[Transactions::class,'WithdrawalStore'])->name('withdrawal.store');
  Route::get('lottery-claim/{id}',[MyLottery::class,'ClaimLottery'])->name('lottery.claim');
});

//Admin
Route::group(['middleware'=>['auth','adminAuth'],'prefix'=>'admin'],function (){
Route::get('/', [Dashboard::class, 'index'])->name('dashboard.admin');

//basic pages
Route::get('users',[Dashboard::class,'users'])->name('users.admin');
Route::get('deposits',[Dashboard::class,'deposits'])->name('deposits.admin');
Route::get('withdrawals',[Dashboard::class,'withdrawals'])->name('withdrawals.admin');
Route::get('investments',[Dashboard::class,'investments'])->name('investments.admin');
//end basic pages ********
//setting pages

//end settings pages *********
//functions requests
Route::get('transaction/confirm/{id}',[Transactions::class,'TransactionConfirm'])->name('transaction.confirm');
Route::get('transaction/delete/{id}',[Transactions::class,'destroy'])->name('transaction.delete');
Route::get('withdrawal/reject/{id}',[Transactions::class,'WithdrawalRejected'])->name('withdrawal.reject');
Route::post('credit-user/{id}',[Dashboard::class,'CreditUser'])->name('admin.credit');
Route::get('delete-user/{id}',[Dashboard::class,'DeleteUser'])->name('user.delete');
//end functions requests ********

//admin settings control
//POST
//Route::post('basic-settings/store',[SettingsController::class,'BasicSettingsStore']);
Route::post('core-settings/store',[SettingsController::class,'CoreSettingsStore']);
Route::post('payment-settings/store',[SettingsController::class,'PaymentSettingsStore']);
Route::post('mail-settings/store',[SettingsController::class,'MailSettingsStore']);
Route::post('system-settings/store',[SettingsController::class,'SystemSettingsStore']);
//GET
//Route::get('basic-settings',[SettingsController::class,'BasicSettings']);
Route::get('core-settings',[SettingsController::class,'CoreSettings']);
Route::get('payment-settings',[SettingsController::class,'PaymentSettings']);
Route::get('mail-settings',[SettingsController::class,'MailSettings']);
Route::get('system-settings',[SettingsController::class,'SystemSettings']);
//end settings ********

});

//end admin ********

// crons
Route::get('invest-cron',[Invest::class,'InvestCron'])->name('invest.cron');
Route::get('lottery-cron',[MyLottery::class,'LotteryCron'])->name('lottery.cron');
//End cron **********

//auth route load
require __DIR__.'/auth.php';


//Artisan commands
Route::get('clear-config',function(){
     Artisan::call("config:clear");
     return "config cleared!";
});
Route::get('clear-cache',function(){
     Artisan::call("cache:clear");
     return "cache cleared!";
});
Route::get('clear-route',function(){
     Artisan::call("route:clear");
     return "route cleared!";
});
Route::get('queue-work',function(){
     Artisan::call("queue:work");
     return "Queue work started!";
});
Route::get('queue-restart',function(){
     Artisan::call("queue:restart");
     return "Queue work restarted!";
});
/*
Route::get('migrate-fresh',function(){
     Artisan::call("migrate:fresh");
     return "Database refreshed!";
});*/