<?php
namespace K1785\UserSettingRequest\Controllers;
use K1785\UserSettingRequest\Views\View;
use K1785\UserSettingRequest\Routes\Route;

class Controller{


    /**
     * @param Route $route
     * @return mixed
     * @throws \Exception
     */
    public function run(Route $route)
    {
        $action = $route->action();
        if(method_exists($this, $action)){
            return $this->$action(...$route->args());
        }
        throw new \Exception('Not find action '.$action.' in '.$route->controller());
    }

    /**
     * @param $controller
     * @return Controller
     */
    public static function factory($controller = null) : Controller
    {
        $controller = $controller.'Controller';
        $className = 'K1785\UserSettingRequest\Controllers\\'.$controller;
        if(class_exists($className)){
            return new $className();
        }
        return new Controller();
    }
}