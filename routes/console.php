<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Invest;
use App\Http\Controllers\MyLottery;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('LotteryCron', function (){
       $lottery = new MyLottery();
       $lottery->LotteryCron();
});

Artisan::command('InvestCron', function (){
     $invest= new Invest();
     $invest->InvestCron();
});
Artisan::command('QueueRetry', function (){
     Artisan::call("queue:retry all");
});
Artisan::command('QueueRestart', function (){
     Artisan::call("queue:restart");
});