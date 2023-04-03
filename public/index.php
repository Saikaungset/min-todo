<?php

session_start();

const BASE_PATH =__DIR__ . '/../';

require BASE_PATH . 'function.php';

$route = require base_path('route.php');

// require '../' . $routes['./notes'];
// $uri =$_SERVER['REQUEST_URI'];

$uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
// var_dump($uri);

if(array_key_exists($uri ,$route)){
    require base_path($route[$uri]);
}else{
    echo"404 NOt Found.";
}
// require base_path($route[$uri]);
require base_path('pro.index.php');

