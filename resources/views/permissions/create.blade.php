@extends('layouts.app')

@section('content')


    {{ Form::open(['url'=>route('permissions.store')]) }}

    @include('permissions._form')


    <button class="btn btn-primary">Создать</button>
    {{ Form::close() }}
@stop
