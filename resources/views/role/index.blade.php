<?php

use App\Models\Users\Role;

/**
 * @var Role $role
 */
?>
@extends('layouts.app')

@section('content')


    <div class="row pb-3">
        <div class="col pl-2">
            {{ Form::open(['url'=>route('role.index'),'method'=>'get','class'=>'form-inline']) }}
            <div class="input-group w-10">
                @include('form._input',[
              'name'=>'search',
              'placeholder'=>'Поиск'
          ])

                <div class="input-group-append ">
                    <button type="submit" class="btn btn-outline-secondary">
                        <i class="fas fa-fw fa-search"></i>
                    </button>
                </div>

            </div>

            {{ Form::close() }}
        </div>
        <div class="col-auto">
            <a href="{{ route('role.create') }}" class="btn btn-outline-success">
                <i class="fas fa-user-plus"></i> Добавить
            </a>
        </div>

        <div class="col-auto">
            <button class="btn btn-outline-danger" form="roles_destroy">
                <i class="fas fa-broom"></i> Удалить роли
            </button>
        </div>
    </div>


    {{Form::open(['url'=>route('roles.mass.destroy'),'method'=>'delete','id'=>'roles_destroy'])}}
    @foreach($roles as $role)
        <div class="row border-bottom pb-3">
            <div class="col-1">
                {{ $role->getKey() }}
            </div>

            <div class="col-3">
                {{ $role->getDisplayName() }}
            </div>

            <div class="col-2">
                {{ $role->getName() }}
            </div>
            <div class="col-2">
                {{ $role->getDescription() }}
            </div>

                <div class="col-1 d-flex justify-content-end">
                    <div class="btn-group">


                    <input class="col-auto btn-group" type='checkbox' name='roless[]' value="{{ $role->getKey() }}" >


                    </div>
                </div>

            <div class="col-3 text-right">
                <div class="btn-group">
                    <a href="{{ route('role.edit',$role) }}" class="btn btn-outline-secondary">
                        Редактировать
                    </a>
                    
                </div>

            </div>

            </div>
    @endforeach
    {{Form::close()}}

    @include('form._pagination',[
    'elements'=>$roles,
    ])


@stop
