


@foreach($users as $user)

    {{ $user->setFirstName() }}
@endforeach
@empty
    <div class="alert alert-danger">
        Роли еще не созданы
    </div>
@endforelse

