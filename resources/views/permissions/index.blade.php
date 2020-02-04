<?php

use App\Models\Users\Permission;

/**
 * @var Permission $permission
 */
?>
@extends('layouts.app')

@section('content')

    <div class="row pb-3">
        <div class="col pl-2">
            {{ Form::open(['url'=>route('permissions.index'),'method'=>'get','class'=>'form-inline']) }}
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
            <a href="{{ route('permissions.create') }}" class="btn btn-outline-success">
                <i class="fas fa-user-plus"></i> Добавить
            </a>
        </div>
    </div>

    @foreach($permissions as $permission)
        <div class="row border-bottom pb-3">
            <div class="col-1">
                {{ $permission->getKey() }}
            </div>

            <div class="col-4">
                {{ $permission->getDisplayName() }}
            </div>

            <div class="col-2">
                {{ $permission->getName() }}
            </div>
            <div class="col-2">
                {{ $permission->getDescription() }}
            </div>

            <div class="col-auto">
                <div class="btn-group">
                    <a href="{{ route('permissions.edit',$permission) }}" class="btn btn-outline-secondary">
                        Редактировать
                    </a>
                </div>

                @if (auth()->id() !== $permission->getKey())
                    {{ Form::open(['url'=>route('permissions.destroy',$permission),'method'=>'DELETE','class'=>'btn-group']) }}
                    <button class="btn btn-outline-danger" onclick="return confirm('Удалить разрешение №{{ $permission->getKey(), $permission->getDisplayName() }}?')">
                        Удалить?
                    </button>
                    {{ Form::close() }}
                @endif
            </div>
        </div>
    @endforeach

    @include('form._pagination',[
    'elements'=>$permissions,
    ])


@stop
