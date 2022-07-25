<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;
use App\Models\MyTransaction;
use App\Models\User;
use Coinbase;
use Notification;
use App\Notifications\User\DepositComplete;

class ChargeConfirmedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CoinbaseWebhookCall $event)
    {
      $e = $event->payload;
      $c = Coinbase::getCharge($e->id);
      $Trans = MyTransaction::whereCode($c->data->id)->first();
      if(isset($Trans)){
        $user = User::find($Trans->user_id);
        $Trans->status=1;
        $user->depositFloat($Trans->amount);
        $Trans->save();
        if(isset($user)){
          Notification::send($user, new DepositComplete($Trans));
        }
      }
    
    }
}
