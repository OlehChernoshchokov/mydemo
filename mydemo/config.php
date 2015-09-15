<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);
define('VIEW_DIR', ROOT . 'View' . DS);
define('LAYOUT', VIEW_DIR . 'layout.phtml');
define('MODEL_DIR', ROOT . 'Model' . DS);
define('CONTROLLER_DIR', ROOT . 'Controller' . DS);
define('LIB_DIR', ROOT . 'Lib' . DS);

$dsn = 'mysql:host=localhost; dbname=blog';
$user = 'root';
$password = '';


$site_name = 'Next Level';
