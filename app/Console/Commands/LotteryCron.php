<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LotteryCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lottery:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update lottery';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(Lottery::whereStatus(1)->first()){
         $lott = Lottery::whereStatus(1)->first();
         $lott->status = 0;
         $lott->save();
        } 
        $user = User::all();
        $num = count($user);
        $random = rand(1,$num);
        $user = User::find($random);
        
        if($this->checkAdmin($user)){
           MyLottery::LotteryCron($request);
        }
        else{
           $details = [
             'amount' => env('LOTTERY_AMOUNT'),
             'name'=>$user->name,
             'email'=>$user->email,
             'user_id'=>$user->id,
           ];
           $lottery = new Lottery($details);
           $lottery->save();
           // send email
           Notification::send($user, new LotteryWinner($lottery));
        }
    }
}
