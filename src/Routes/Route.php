<?php

namespace K1785\UserSettingRequest\Routes;

class Route{

    protected $controller = 'Controller';
    protected $action = 'index';
    protected $request = [];

    public function __construct($server = [], $request = [])
    {
        $requestUri = ! empty($server['REQUEST_URI']) ? $server['REQUEST_URI'] : '/';
        $path = explode('/', trim('/', $requestUri));
        print_r($path);
        $this->request = $request;
    }

    public function controller()
    {
        return $this->controller;
    }

    public function action()
    {
        return $this->action;
    }

    public function request()
    {
        return $this->request;
    }
}
