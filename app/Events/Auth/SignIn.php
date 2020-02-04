<?php

namespace App\Events\Auth;

use App\Models\Users\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Users\UserLog;

class SignIn
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    /**
     * @var User
     */
    public $user;

    /**
     * SignIn constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user=$user;
    }

    /**
     * @return User
     */
    public function getUser():User{
        return $this->user;
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
