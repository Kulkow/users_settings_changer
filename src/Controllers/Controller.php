<?php
namespace K1785\UserSettingRequest\Controllers;
use K1785\UserSettingRequest\Views\View;
use K1785\UserSettingRequest\Routes\Route;

class Controller{

    protected array $request = [];

    /**
     * @param Route $route
     * @return mixed
     * @throws \Exception
     */
    public function run(Route $route)
    {
        $action = $route->action();
        if(method_exists($this, $action)){
            $this->request = $route->request();
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

    /**
     * @return array
     */
    protected function auth() : array
    {
        return [
            'id' => 1,
            'role' => 'admin'
        ];
    }

    public function error($code, $message)
    {
        if(is_array($message)){
            $message = json_encode($message, JSON_UNESCAPED_UNICODE);
        }
        var_dump('Code : '.$code);
        var_dump('Message : '.$message);
    }

    public function render($template, array $vars = [])
    {
        $view = new View($template);
        $view->set($vars);
        return $view->render();
    }
}