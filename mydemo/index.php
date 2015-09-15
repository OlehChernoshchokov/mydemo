<?php

require 'config.php';

function __autoload($className){
    $fileName = $className . '.php';

    if (file_exists(CONTROLLER_DIR . $fileName) ) { //подключаем папку Controller
        require CONTROLLER_DIR . $fileName;
    } elseif (file_exists(MODEL_DIR . $fileName) ) { //подключаем папку Model
        require MODEL_DIR . $fileName;
    } elseif (file_exists(LIB_DIR . $fileName) ) { //подключаем папку Lib
        require LIB_DIR . $fileName;
    }else {
        throw new Exception("{$fileName} not found");
    }
}


/**
 * определяем константу для контроллера и экшена из урла
 */
$_controller = isset($_GET['controller']) ? $_GET['controller'] : 'index';
$_action = isset($_GET['action']) ? $_GET['action'] : 'index';

$_controller = ucfirst(strtolower($_controller)) . 'Controller';

$_action = strtolower($_action) . 'Action';

session_start();
$menu = new Menu();

try{
    /**
     * DB here
    */
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->exec('SET NAMES utf8');
    Registry::set('db', $dbh);

    /**
     * define menu urls
     */

    $menu = $menu ->getMenuUrl();

    $_params = $_GET;
    unset($_params['controller'], $_params['action']);

    $_controller = new $_controller;

    if (method_exists($_controller, $_action)) {
        $content = $_controller->$_action($_params);
    }else{
        throw new Exception("{$_action} not found");
    }
}catch (Exception $e){
    $content = $e->getMessage();
}


$data = array(
    'site_name' => $site_name,
    'menu' => $menu,
    'content' => $content

);

require LAYOUT;