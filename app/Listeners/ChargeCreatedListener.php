<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;
use App\Models\MyTransaction;
use App\Models\User;
use Coinbase;
use Notification;
use App\Notifications\User\Deposit;

class ChargeCreatedListener implements ShouldQueue
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
      //$c = Coinbase::getCharge($e->event->id);
      $c = $e->event->data;
      //details 
      $details = [
          'user_id'=>$c->metadata->user_id,
          'type'=>$c->metadata->type,
          'coin'=>$c->metadata->coin,
          'amount'=>$c->pricing->local->amount,
          'ref'=> $c->metadata->ref,
          'name'=>$c->metadata->name,
          'email'=>$c->metadata->email,
          'code'=>$c->code
          ];
      $Trans = new MyTransaction($details);
      $Trans->save();
      $user = User::find($Trans->user_id);
      if(isset($user)){
          Notification::send($user, new Deposit($Trans));
        }
      
    }
}
