<?php
/*
Plugin Name: WordPress Illuminate Database
Description: Illuminate Database wrapper plugin for WordPress.
Author: Nikolay Nesov
Text Domain: wpidb
Domain Path: /languages/
Version: 0.1
*/

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => DB_HOST,
    'database'  => DB_NAME,
    'username'  => DB_USER,
    'password'  => DB_PASSWORD,
    'charset'   => DB_CHARSET,
    'collation' => DB_COLLATE,
    'prefix'    => '',
]);

$capsule->setEventDispatcher(new Dispatcher(new Container));

$capsule->setAsGlobal();

$capsule->bootEloquent();
