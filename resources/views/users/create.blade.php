@extends('layouts.app')

@section('content')


    {{ Form::open(['url'=>route('poll.store')]) }}

    @include('golosovanie._formall')


    <button class="btn btn-primary">Создать</button>
    {{ Form::close() }}
@stop
