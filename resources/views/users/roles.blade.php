@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">
        <div class="col-8 col-lg-4">

            {{ Form::model($user,['url'=>route('users.roles.update',$user),'method'=>'PATCH']) }}


            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Roles</div>

                            <div class="card-body">


                                @include('users._roles')
                                <div class="pt-3 text-center">
                                    <button class="btn btn-primary">Сохранить</button>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>

@stop
