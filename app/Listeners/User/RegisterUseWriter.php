<?php

namespace App\Listeners\User;

use App\Events\User\RegisterUse;
use App\Models\Users\UserLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Users\User;

class RegisterUseWriter
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
     * @param  RegisterUse  $event
     * @return void
     */
    public function handle(RegisterUse $event)
    {
        $user = $event->getUser();
        $log = new UserLog();
        $log->{'user_id'} = $user->getKey();
        $log->{'event_id'} = 1;
        $log->{'targetable_id'} = $user->getKey();
        $log->{'targetable_type'} = get_class($user);
        $log->{'ip'} = ip2long(request()->getClientIp());
        $log->save();
    }
}
