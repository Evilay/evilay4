<?php

// Home
use App\Models\Users\User;
use App\Models\Users\Permission;
use App\Models\Users\Role;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;

try {
    Breadcrumbs::for('/', function (BreadcrumbsGenerator $trail) {
        $trail->push('CRM', route('/'));
    });

    Breadcrumbs::for('home', function (BreadcrumbsGenerator $trail) {
        $trail->push('CRM', route('home'));
    });

    Breadcrumbs::for('users.index', function (BreadcrumbsGenerator $trail) {
        $trail->parent('home');
        $trail->push('Пользователи', route('users.index'));
    });


    Breadcrumbs::for('users.create', function (BreadcrumbsGenerator $trail) {
        $trail->parent('users.index');
        $trail->push('Добавить пользователя', route('users.create'));
    });


    Breadcrumbs::for('users.show', function (BreadcrumbsGenerator $trail, User $user) {
        $trail->parent('users.index');
        $trail->push($user->getName(), route('users.show', $user));
    });


    Breadcrumbs::for('users.edit', function (BreadcrumbsGenerator $trail, User $user) {
        $trail->parent('users.show', $user);
        $trail->push('Управление', route('users.edit', $user));
    });

    Breadcrumbs::for('role.index', function (BreadcrumbsGenerator $trail) {
        $trail->parent('home');
        $trail->push('Роли', route('role.index'));
    });


    Breadcrumbs::for('role.create', function (BreadcrumbsGenerator $trail) {
        $trail->parent('role.index');
        $trail->push('Добавить роль', route('role.create'));
    });


    Breadcrumbs::for('role.show', function (BreadcrumbsGenerator $trail, Role $role) {
        $trail->parent('role.index');
        $trail->push($role->getDisplayName(), route('role.show', $role));
    });


    Breadcrumbs::for('role.edit', function (BreadcrumbsGenerator $trail, Role $role) {
        $trail->parent('role.show', $role);
        $trail->push('Управление', route('role.edit', $role));
    });

    Breadcrumbs::for('permissions.index', function (BreadcrumbsGenerator $trail) {
        $trail->parent('home');
        $trail->push('Роли', route('permissions.index'));
    });


    Breadcrumbs::for('permissions.create', function (BreadcrumbsGenerator $trail) {
        $trail->parent('permissions.index');
        $trail->push('Добавить роль', route('permissions.create'));
    });


    Breadcrumbs::for('permissions.show', function (BreadcrumbsGenerator $trail, Permission $permission) {
        $trail->parent('permissions.index');
        $trail->push($permission->getDisplayName(), route('permissions.show', $permission));
    });


    Breadcrumbs::for('permissions.edit', function (BreadcrumbsGenerator $trail, Permission $permission) {
        $trail->parent('permissions.show', $permission);
        $trail->push('Управление', route('permissions.edit', $permission));
    });

    Breadcrumbs::for('users.password', function (BreadcrumbsGenerator $trail, User $user) {
        $trail->parent('users.index');
        $trail->push($user->getName(), route('users.password', $user));
    });

    Breadcrumbs::for('users.roles', function (BreadcrumbsGenerator $trail, User $user) {
        $trail->parent('users.index');
        $trail->push($user->getName(), route('users.roles', $user));
    });

    Breadcrumbs::for('users.logs', function (BreadcrumbsGenerator $trail, User $user) {
        $trail->parent('users.index');
        $trail->push($user->getName(), route('users.logs', $user));
    });



} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
    echo 'Ошибка генерации пути:' . $e->getMessage();
}

