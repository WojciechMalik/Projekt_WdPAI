<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get('login', 'DefaultController');
Routing::get('dashboard', 'DefaultController');
Routing::get('statistics', 'DefaultController');
Routing::get('navigation', 'DefaultController');
Routing::get('limits', 'DefaultController');
Routing::run($path);