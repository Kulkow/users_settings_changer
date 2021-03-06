<?php
namespace K1785\UserSettingRequest\Models\UserSettings;

use K1785\UserSettingRequest\Models\RequestChanges\RequestChangeBase;
use K1785\UserSettingRequest\Models\RequestChanges\RequestChangeProvider;

class UserSettingField extends UserSettingBase implements UserSettingInterface {

    protected string $description = 'Изменение поля';
    protected $field = [];

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
        if(! empty($config['field'])){
            $this->field = $config['field'];
        }
    }

    public function fields() : array
    {
        return [
            $this->field
        ];
    }

    public function setting(array $data = [])
    {
        $this->setting = $data[$this->field];
    }

    /**
     * @param array $data
     * @return bool
     */
    public function validate(array $data = [] ) : bool
    {
        $this->errors = [];
        if(empty($this->field)){
            return false;
        }
        if(empty($data[$this->field])){
            $this->errors[] = 'не заполнено поле';
            return false;
        }
        return true;
    }

    public function requestChange() : RequestChangeBase
    {
        return new RequestChangeProvider();
    }

    public function isRequestChange() : bool
    {
        return true;
    }
}