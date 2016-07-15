<?php

namespace App\Listeners;

use App\Events\SeatWasBought;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvoice
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
     * @param  SeatWasBought  $event
     * @return void
     */
    public function handle(SeatWasBought $event)
    {
        //
    }
}
