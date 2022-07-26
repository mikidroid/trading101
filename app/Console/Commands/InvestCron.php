<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;

class InvestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invest:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating investments';

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
        $invs = Investment::whereStatus(1)->get();
        $current_date = Carbon::now();
        //loop users
        foreach ($invs as $inv){
         $user = User::find($inv->user_id);
         $profit = $user->getWallet('profit');
           //check for expired investment
           if($inv->end_date < $current_date){
            $sum = $inv->amount + $inv->interest;
            $profit->withdrawFloat($inv->interest);
            $user->depositFloat($sum);
            $inv->status = 0;
            $inv->save();
            Notification::send($user, new InvestmentComplete($inv,$sum));
          } else{
         //calculate percent
         $percent = $inv->amount/100*env('INTEREST_PERCENT');
         $profit->depositFloat($percent);
         $inv->interest += $percent;
         $inv->save();
         Notification::send($user, new InvestmentUpdate($inv,$percent));
          }
        }
    }
}
