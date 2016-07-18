<?php

namespace App\Events;

use App\Events\Event;
use App\EventSeats;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SeatWasBought extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $user_id;

    public $seat_id;

    public $event_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user,$seat,$event_id)
    {
        $this->user_id = $user;
        $this->seat_id = $seat;
        $this->event_id = $event_id;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['main'];
    }
}
