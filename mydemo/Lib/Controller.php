<?php

class Controller{
    protected function render($viewName, array $data = array()){
        $className = str_replace('Controller', '', get_class($this) );
        $path = VIEW_DIR . $className . DS . $viewName . '.phtml';
        //echo $path;

        if (!file_exists($path)){
            throw new Exception("{$path} not found");
        }

        extract($data);

        ob_start();
        require $path;
        return ob_get_clean();
    }
}