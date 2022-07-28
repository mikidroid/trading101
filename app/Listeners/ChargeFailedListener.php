<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;
use App\Models\MyTransaction;
use App\Models\User;
use Coinbase;
use Notification;
use App\Notifications\User\DepositFailed;

class ChargeFailedListener implements ShouldQueue
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
      $e = json_decode(json_encode($event->payload));
      $c = $e->event->data;
      $Trans = MyTransaction::whereRef($c->metadata->ref)->first();
      if(isset($Trans)){
        $user = User::find($Trans->user_id);
        $Trans->status=2;
        $Trans->save();
        if(isset($user)){
          Notification::send($user, new DepositFailed($Trans));
        }
      }
        //
    }
}
