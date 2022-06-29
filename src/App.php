<?php
namespace K1785\UserSettingRequest;
use K1785\UserSettingRequest\Controllers\Controller;
use K1785\UserSettingRequest\Routes\Route;


class App{

    public function run($server, $request  = [])
    {
        $route = new Route($server, $request);
        $controller = $route->controller();
        $controller = Controller::factory($controller);
        $controller->run($route);
    }
}