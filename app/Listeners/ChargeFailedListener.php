<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;

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
       $e = $event->payload;
        //
    }
}
