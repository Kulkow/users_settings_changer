<?php
namespace K1785\UserSettingRequest;
use K1785\UserSettingRequest\Controllers\Controller;
use K1785\UserSettingRequest\Routes\Route;


class App{

    public function run($server)
    {
        $route = new Route($server);
        $controller = $route->controller();
        $action = $route->action();
        $request = $route->request();
        $controller = Controller::factory($controller);
        $controller->run($route);
    }
}