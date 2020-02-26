<?php

use App\Models\Users\User;
use App\Models\Polls\PollValue;
use App\Models\Polls\Poll;

/**
 *
 */
?>
@extends('layouts.app')

@section('content')

        <div class="row border-bottom py-1  ">
            <div class="col-lg-6 col-5">

               <h1 class="navbar-brand"> {{ $poll->getName() }} </h1>

            </div>
        </div>

        <div class="p-3">
            {{ $poll->getDescription() }}
        </div>

    <div>

        {{ Form::open(['url'=>route('vote.store',$poll)]) }}

        @foreach($pollValues as $pollValue)
            <div class="col-lg-6 col-5 p-2 border-bottom">

                {{ $pollValue->getName() }}

                <input name="idValue" type="radio" value="{{$pollValue->getId()}}">


            </div>

            @endforeach

        <button class="btn btn-primary">
            Проголосовать
        </button>

        {{ Form::close() }}

    </div>
@stop
