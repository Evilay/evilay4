<?php

use App\Models\Users\User;


/**
 * @var \App\Models\Polls\PollValue $value
 */
?>
@extends('layouts.app2')

@section('content')


<div class="sectiondio align-content-center justify-content-center">
    <div class="sectiondio align-content-center justify-content-center" >
        <div class="sectiondio2">
            <div class="sectiondio3">
                <header>
                    <h3><a href="#" style="color: #483949;">{{$poll->getName()}}</a></h3>
                </header>
                @foreach($values as $value)
                <div class="w-100 ">
                    <div >
                        {{ $value->getName() }}
                        {{ $value->getVotesCount() }}
                    </div>
                    <div style="width: {{$value->getVotesCount()*40}}px; height: 10px; background-color: #3B353C">
                    </div>

                </div>
                @endforeach
                <div class="p-4"> Количество ваших голосов: {{$votes}}</div>


{{--                <p style="color: #483949;">1 место:</p>--}}
{{--                <p style="color: #483949;">2 место:</p>--}}
{{--                <p style="color: #483949;">3 место:</p>--}}
            </div>

        </div>


    </div>

    <div class="sectiondio sectiondio3 col-4">

        <a href="/polls" class="button">На главную</a>

    </div>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>

</div>

@stop
