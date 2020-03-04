<?php

use App\Models\Users\User;

/**
 * @var User $user
 */

?>

@role(['Overlord','Admin'])


<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarText">
            <ul class="navbar-nav mr-auto ">

                @if (auth()->check())

                    <li class="nav">
                        <a class="nav" href=" {{ route('polls.create') }}"> Создать голосование</a>
                    </li>

{{--                    <li class="nav">--}}
{{--                        <a class="nav" href=" {{ route('polls.edit',$polls) }}"> Редактировать голосование</a>--}}
{{--                    </li>--}}

                @endif

            </ul>




        </div>
    </nav>
</div>
@endrole
