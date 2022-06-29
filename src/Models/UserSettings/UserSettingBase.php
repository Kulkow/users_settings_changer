<?php
namespace K1785\UserSettingRequest\Models\UserSettings;
use K1785\UserSettingRequest\Models\Records\Record;

abstract class UserSettingBase implements UserSettingInterface {

    protected array $setting = [];
    protected array $config = [];
    protected array $errors = [];
    protected string $description = '';
    protected $type = null;
    protected Record $record;

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


    public function setRecord(Record $record)
    {
        $this->record = $record;
    }

    public function record() : Record
    {
        return $this->record;
    }

    /**
     * @return array
     */
    public function data() : array
    {
        //данные которые нужно сохранить
        return $this->setting;
    }



    public function type()
    {
        return $this->type;
    }

    /**
     * @param $type
     * @param $config
     * @return UserSettingBase
     * @throws \Exception
     */
    public static function factory($type, $config = []) : UserSettingBase
    {
        $type = ucwords($type);
        $class  = 'K1785\UserSettingRequest\Models\UserSettings\UserSetting'.$type;
        if(! class_exists($class)){
            throw new \Exception('Not find UserSetting'.$type);
        }
        return new $class($config);
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

    public function save(): bool
    {
        return true;
    }
}