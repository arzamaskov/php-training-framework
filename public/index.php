<?php

$query = $_SERVER['QUERY_STRING'];

require_once '../vendor/core/Router.php';
require_once '../vendor/libs/functions.php';

Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);

debug(Router::getRoutes());
