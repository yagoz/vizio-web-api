<?php

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Configure the database and boot Eloquent
 */
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'sqlite',
    'host'      => 'localhost',
    'database'  => __DIR__.'/../data/db.sqlite',
]);

/*$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'olx',
    'username'  => 'root',
    'password'  => 'admin',
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci',
]);*/

$capsule->setAsGlobal();
$capsule->bootEloquent();
// set timezone for timestamps etc
date_default_timezone_set('UTC');
