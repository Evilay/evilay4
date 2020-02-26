<?php

use App\Models\Users\User;
use App\Models\Polls\PollValue;
use App\Models\Polls\Poll;

/**
 *
 */
?>
@extends('layouts.app2')

@section('content')




    <div class="sectiondio" >
        <div class="sectiondio2">
            <div class="sectiondio3">
                <header>
                    <h3><a href="#" style="color: #483949;">{{$poll->getName()}}</a></h3>
                </header>
                <p style="color: #483949;">1 место:</p>
                <p style="color: #483949;">2 место:</p>
                <p style="color: #483949;">3 место:</p>
            </div>
            <canvas id="oilChart" width="600" height="400"></canvas>
            <div style="display:inline-block; width: 40em; height: 25em; color: #483949;" id="flot-pie-chart"></div>
        </div>
    </div>

    <div class="sectiondio sectiondio3">
        {{ Form::open(['url'=>route('users.index')]) }}

        <button class="btn btn-primary">
            На главную
        </button>

        {{ Form::close() }}
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>

    <div id="container" style="width: 80%;min-width: 500px; height: 400px; margin: 0 auto"></div>

    <script>
        $(function () {
            $('#container').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Browser market shares at a specific website, 2014'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Cases',


                }]

            });
        });

    </script>

{{--        <script src="https://www.google.com/jsapi"></script>--}}
{{--        <script src="assets/js/jquery.min.js"></script>--}}
{{--        <script src="assets/js/jquery.dropotron.min.js"></script>--}}
{{--        <script src="assets/js/jquery.scrolly.min.js"></script>--}}
{{--        <script src="assets/js/jquery.scrollex.min.js"></script>--}}
{{--        <script src="assets/js/browser.min.js"></script>--}}
{{--        <script src="assets/js/breakpoints.min.js"></script>--}}
{{--        <script src="assets/js/util.js"></script>--}}
{{--        <script src="assets/js/main.js"></script>--}}

{{--        <script src="script.js"></script>--}}


@stop
