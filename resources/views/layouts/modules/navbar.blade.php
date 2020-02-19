<?php

use App\Models\Users\User;

/**
 * @var User $user
 */

?>


<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">EVILAY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarText">
            <ul class="navbar-nav mr-auto ">

                @if (auth()->check())

                    <li class="nav-item ">
                        <a class="nav-link" href=" {{ route('users.index') }}"> <i class="fas fa-users"></i>  Пользователи</a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('role.index') }}"><i class="fas fa-user-tag"></i>  Роли</a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('permissions.index') }}"><i class="fas fa-balance-scale-right"></i>   Разрешения</a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('golosovanie.index') }}"><i class="fas fa-sitemap"></i>  Сайт</a>

                    </li>

                @endif

            </ul>

            <ul class="navbar-nav">
                @if (auth()->check())
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-ninja"></i>

                           <!-- <img class="rounded float-left w-25 h-25" src="{{Auth::user()->getAvatar()}}"> -->
                            {{  auth()->user()->getName() }}
                        </a>


                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            {{ Form::open(['url'=>route('logout')]) }}

                            <button class="dropdown-item" onclick="return confirm('Вы действительно хотите выйти?')">
                                Выйти
                            </button>
                            {{ Form::close() }}
                        </div>
                    </li>
                @else
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                    </li>
                @endif

            </ul>


        </div>
    </nav>
</div>




