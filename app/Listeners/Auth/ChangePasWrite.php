<?php

namespace App\Listeners\Auth;

use App\Events\Auth\ChangePas;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Users\UserLog;

class ChangePasWrite
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
     * @param  ChangePas  $event
     * @return void
     */
    public function handle(ChangePas $event)
    {
        $user = $event->getUser();
        $log = new UserLog();
        $log->{'user_id'} = \Auth::id();
        $log->{'event_id'} = 3;
        $log->{'targetable_id'} = $user->getKey();
        $log->{'targetable_type'} = get_class($user);
        $log->{'ip'} = ip2long(request()->getClientIp());
        $log->save();

    }
}
