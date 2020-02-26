@extends('layouts.app')

@section('content')


    {{ Form::open(['url'=>route('polls.store'),'enctype'=>"multipart/form-data"]) }}

    @include('Polls._formall')


    <button class="btn btn-primary">Создать</button>
    {{ Form::close() }}
@stop
