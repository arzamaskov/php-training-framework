<?php

declare(strict_types=1);

error_reporting(-1);

$query = rtrim($_SERVER['QUERY_STRING'], '/');

require_once '../vendor/core/Router.php';
require_once '../vendor/libs/functions.php';

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

debug(Router::getRoutes());

Router::dispatch($query);
