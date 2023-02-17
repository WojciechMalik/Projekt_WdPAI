<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('dashboard', 'ProjectController');
Router::get('statistics', 'StatisticsController');

Router::get('limits', 'LimitController');

Router::get('newtransaction', 'DefaultController');
//Router::get('registration', 'DefaultController');
Router::get('logout', 'SecurityController');

Router::post('setLimits', 'LimitController');
Router::post('login', 'SecurityController');
Router::post('addTransaction', 'ProjectController');
Router::post('registration', 'SecurityController');



Router::run($path);