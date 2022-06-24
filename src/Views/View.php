<?php
namespace K1785\UserSettingRequest\Views;

class View{

    protected $data = [];
    protected $path = 'templates';
    protected $template = null;

    public function __construct($template = null)
    {
        $this->template = $template;
    }

    public function set(array $data = []){
        $this->data = $data;
    }

    public function render($template = null)
    {
        if(! $template){
            $template = $this->template;
        }
        return include __DIR__.'/templates/'.$template.'.php';
    }
}