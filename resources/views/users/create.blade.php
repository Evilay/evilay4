@extends('layouts.app')

@section('content')


    {{ Form::open(['url'=>route('users.store')]) }}

    @include('users._formall')


    <button class="btn btn-primary">Создать</button>
    {{ Form::close() }}
@stop
