<?php

namespace App\Events;

use App\Attendance;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AttendanceEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * The order instance.
     *
     * @var \App\Models\Order
     */
    public $attendance;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Attendance $attendance)
    {

        $this->attendance = $attendance;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
