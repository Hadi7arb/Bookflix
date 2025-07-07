<?php 
    $apis = [
        '/movies'       => ['controller' => 'MovieController', 'method' => 'getAllMovies'],
        '/movies/add'   => ['controller' => 'MovieController', 'method' => 'AddMovie'],

        '/users/create'    => ['controller' => 'UserController', 'method' => 'createUser'],
        '/users/login'      => ['controller' => 'UserController', 'method' => 'userLogin'],

        '/directors'        =>['controller' => 'DirectorsController', 'method' => 'AddDirector'],

        '/showings'         =>['controller' => 'ShowingsController', 'method' => 'getShowings']
    ];