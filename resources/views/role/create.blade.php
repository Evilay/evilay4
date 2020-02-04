@extends('layouts.app')

@section('content')


    {{ Form::open(['url'=>route('role.store')]) }}

    @include('role._form')


    <button class="btn btn-primary">Создать</button>
    {{ Form::close() }}
@stop
