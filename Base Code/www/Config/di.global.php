<?php

use DontKnow\Models\Users;
use DontKnow\Models\Articles;
use DontKnow\Controllers\UsersController;
use DontKnow\Controllers\ArticlesController;
use DontKnow\VO\DbDriver;
use DontKnow\VO\DbHost;
use DontKnow\VO\DbName;
use DontKnow\VO\DbUser;
use DontKnow\VO\DbPwd;

return [
    DbDriver::class => function($container) {
        return new DbDriver($container['config']['db']['driver']);
    },
    DbHost::class => function($container) {
        return new DbHost($container['config']['db']['host']);
    },
    DbName::class => function($container) {
        return new DbName($container['config']['db']['name']);
    },
    DbUser::class => function($container) {
        return new DbUser($container['config']['db']['user']);
    },
    DbPwd::class => function($container) {
        return new DbPwd($container['config']['db']['pwd']);
    },
    Users::class => function($container) {
        return new Users();
    },
    UsersController::class => function($container) {
        $usersModel = $container[Users::class]($container);
        return new UsersController($usersModel);
    },
    ArticlesController::class => function($container) {
        $usersModel = $container[Articles::class]($container);
        return new ArticlesController($usersModel);
    },
];