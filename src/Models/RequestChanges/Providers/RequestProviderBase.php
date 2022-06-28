<?php
namespace K1785\UserSettingRequest\Models\RequestChanges\Providers;

abstract class RequestProviderBase implements RequestProviderInterface{


    protected $template = null;
    protected $data = [];

    /**
     * @param array $data
     * @param $template
     * @return void
     */
    public function load(array $data, $template = null)
    {
        $this->data = $data;
        $this->template = $template;
    }


    /**
     * @param $type
     * @return RequestProviderBase
     * @throws \Exception
     */
    public static function factory($type = null) : RequestProviderBase
    {
        $type = ucfirst($type);
        $class = 'K1785\UserSettingRequest\Models\RequestChanges\Providers\RequestProvider'.$type;
        if(! class_exists($class)){
            throw new \Exception('Not found RequestProviderBase'.$type);
        }
        return new $class();
    }
}