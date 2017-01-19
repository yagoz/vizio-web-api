<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel;

$routes = new RouteCollection();

$routes->add('instructions', new Route(
    '/', 
    array('_controller' => 'User\\Controller\\UserController::indexAction'))
);

$routes->add('users_list', new Route(
    '/user/', 
    array('_controller' => 'User\\Controller\\UserController::listAction'),
    array('userId'=> '\d+'), array(), '', array(), array('GET', 'HEAD'))
);

$routes->add('users_info', new Route(
    '/user/{userId}', 
    array('_controller' => 'User\\Controller\\UserController::getAction'),
    array('userId'=> '\d+'), array(), '', array(), array('GET', 'HEAD'))
);

$routes->add('users_create', new Route(
    '/user/', 
    array('_controller' => 'User\\Controller\\UserController::createAction'),
    array(), array(), '', array(), array('POST'))
);

$routes->add('users_delete', new Route(
    '/user/{userId}', 
    array('_controller' => 'User\\Controller\\UserController::deleteAction'),
    array('userId'=> '\d+'), array(), '', array(), array('DELETE'))
);

$routes->add('user_upload', new Route(
    '/user/{userId}/image', 
    array('_controller' => 'User\\Controller\\UserController::uploadImageAction'),
    array('userId'=> '\d+'), array(), '', array(), array('POST'))
);

$routes->add('user_update', new Route(
    '/user/{userId}', 
    array('_controller' => 'User\\Controller\\UserController::updateAction'),
    array('userId'=> '\d+'), array(), '', array(), array('POST'))
);


return $routes;
