<?php

use App\Models\Polls\Poll;
use App\Models\Users\User;


?>
@extends('layouts.app2')

@section('content')


    <div class="row pb-3">
        <div class="col">
            {{ Form::open(['url'=>route('polls.index'),'method'=>'get','class'=>'form-inline']) }}
            <div class="input-group">
                @include('form._input',[
              'name'=>'search',
              'placeholder'=>'Поиск'
          ])

                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary">
                        <i class="fas fa-fw fa-search"></i>
                    </button>
                </div>

            </div>
            <div class="col-auto">
{{--                <a href="{{ route('users.create') }}" class="btn btn-outline-success">--}}
{{--                    <i class="fas fa-user-plus"></i> Добавить--}}
{{--                </a>--}}
            </div>

            {{ Form::close() }}
        </div>

    </div>



    @foreach($polls as $poll)
        <div class="row border-bottom py-1  ">
            <div class="col-1">
                {{ $poll->getKey() }}
            </div>




            <div class="col-lg-6 col-5">

                {{ $poll->getName() }}

            </div>

            <div class="col-lg-4 text-right">



{{--                <div class="btn-group">--}}
{{--                    <a href="{{ route('users.roles',$poll) }}" class="btn btn-outline-secondary">--}}
{{--                        <i class="fa fa-fw fa-user-secret"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}




{{--                <div class="btn-group">--}}
{{--                    <a href="{{ route('users.edit',$poll) }}" class="btn btn-outline-secondary">--}}
{{--                        <i class="fa fa-fw fa-edit fa-fw"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}


{{--                <div class="btn-group">--}}
{{--                    <a href="{{ route('users.password',$poll) }}" class="btn btn-outline-secondary">--}}
{{--                        <i class="fas fa-key"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}




            </div>
        </div>
    @endforeach

    @include('form._pagination',[
    'elements'=>$polls,
    ])


@stop
