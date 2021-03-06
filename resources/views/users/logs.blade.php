<?php
use App\Models\Users\UserLog;
use App\Models\Users\User;
/**
 * @var UserLog $log
 * @var User $user
 */
?>
@extends('layouts.app')

@section('content')




    <div class="row pb-3">
        <div class="col">
            {{ Form::open(['url'=>route('users.index'),'method'=>'get','class'=>'form-inline']) }}
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
                <button class="btn btn-outline-danger" form="logs_destroy">
                    <i class="fas fa-broom"></i> Очистить логи
                </button>
            </div>

            {{ Form::close() }}
        </div>


    </div>
    {{Form::open(['url'=>route('users.logs.destroy',$user->getKey()),'method'=>'delete','id'=>'logs_destroy'])}}

    @forelse($logs as $log)
    <div class="row border-bottom py-2">
      <div class="col-1">
          №{{ $log->getKey() }}
      </div>

        <div class="col-2">
            <span title="{{$log->created_at}}">
                            {{ $log->created_at->diffForHumans() }}
            </span>
        </div>
        <div class="col-6">
           {!!  $log->getName()  !!}
        </div>
        <div class="col-2">
        {{ $log->getIp() }}
        </div>


        <div>
            <input type='checkbox' name='logs[]' value="{{ $log->getKey() }}" >
        </div>
    </div>
    @empty
        <div class="alert alert-info">
            Логи отсутствуют
        </div>
    @endforelse
    {{ Form::close() }}

@stop
