<?php

return [
    [
        'method' => 'GET',
        'path' => '/',
        'controller' => 'App\\Controller\\IndexController:index'
    ],
    [
        'method' => ['GET', 'POST'],
        'path' => '/add',
        'controller' => 'App\\Controller\\IndexController:index'
    ],
];
