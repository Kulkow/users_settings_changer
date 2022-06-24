<?php
namespace K1785\UserSettingRequest\Controllers;
use K1785\UserSettingRequest\Views\View;

class Controller{

    public function run()
    {
        $view = new View();
        return $view->render();
    }

    /**
     * @param $controller
     * @return Controller
     */
    public function factory($controller = null) : Controller
    {
        $className = 'K1785\UserSettingRequest\Controllers\\'.$controller;
        if(class_exists($className)){
            return new $className();
        }
        return new Controller();
    }
}