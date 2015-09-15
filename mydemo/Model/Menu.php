<?php

class Menu{
    private  $menu = array(
      'Home' => array(
            'controller' => 'index',
            'action' => 'index'
      ),
      'About' => array(
            'controller' => 'index',
            'action' => 'about'
      ),
      'Contact' => array(
          'controller' => 'index',
          'action' => 'contact'
      )
    );

    public function getMenuUrl(){
        $urls = array();
        foreach ($this->menu as $name => $item){
            $controller = $item['controller'];
            $action = $item['action'];
            $urls[$name] = "/index.php?controller={$controller}&action={$action}";
        }
        return $urls;
    }
}