<?php
namespace K1785\UserSettingRequest\Models\UserSettings;

abstract class UserSettingBase implements UserSettingInterface {

    protected $setting = [];
    protected $config = [];
    protected $errors = [];
    protected $description = '';

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function setting(array $data = [])
    {
        $this->setting = $data;
    }

    /**
     * @return array
     */
    public function errors() : array
    {
        return $this->errors;
    }

    /**
     * @return string
     */
    public function description() : string
    {
        return $this->description;
    }
}