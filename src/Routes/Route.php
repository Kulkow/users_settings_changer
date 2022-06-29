<?php

namespace K1785\UserSettingRequest\Routes;

class Route{

    protected $controller = 'Controller';
    protected $action = 'index';
    protected $request = [];
    protected $args = [];

    public function __construct($server = [], $request = [])
    {
        $requestUri = ! empty($server['REQUEST_URI']) ? $server['REQUEST_URI'] : '/';
        $path = explode('/',  $requestUri);
        $path = array_filter($path);
        $path = array_values($path);
        $args = $path;
        if(! empty($path[0])){
            $this->controller = str_replace(['-', '_'], '', ucwords($path[0], '-_'));
            array_shift($args);
        }
        if(! empty($path[1])){
            $this->action = str_replace(['-'], '_', strtolower($path[1]));
            array_shift($args);
        }
        $this->args = $args;
        $this->request = $request;
    }

    public function controller() : string
    {
        return $this->controller;
    }

    public function action() : string
    {
        return $this->action;
    }

    public function request()  : array
    {
        return $this->request;
    }

    public function args() : array
    {
        return $this->args;
    }
}
