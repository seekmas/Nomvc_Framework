<?php
require_once './loader/loader.php';
echo '<pre>';
$route = new libs\route\Route();


$kernel = new libs\handle\Kernel( $route );
$kernel->sendResponse();