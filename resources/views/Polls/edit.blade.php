@extends('layouts.app')

@section('content')


{{--        <div class=" text-center">--}}
{{--            <img class="rounded w-25 img-thumbnail" src="{{$poll->getAvatarPublicPath()}}">--}}
{{--        </div>--}}



            {{ Form::model($poll,['url'=>route('polls.update',$poll),'method'=>'PATCH', 'enctype'=>"multipart/form-data"])}}

            @include('Polls._formall')

            <div class="pt-3 text-center">
                <button class="btn btn-primary">Сохранить</button>

            </div>
            {{ Form::close() }}


@stop

