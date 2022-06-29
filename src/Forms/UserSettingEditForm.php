<?php
namespace K1785\UserSettingRequest\Forms;

use K1785\UserSettingRequest\Models\UserSettings\UserSettingBase;

/**
 * @property UserSettingBase $UserSettingBase
 */
class UserSettingEditForm extends Form implements FormInterface {

    public function __construct(array $config = [])
    {
        parent::__construct($config);
        if(empty($this->config['UserSetting'])){
            throw new \Exception('Not set UserSetting');
        }
        $this->UserSettingBase = $this->config['UserSetting'];
    }


    public function validate(): bool
    {
        if(! $this->UserSettingBase->validate($this->data)){
            $this->errors = $this->UserSettingBase->errors();
            return false;
        }
        $this->UserSettingBase->setting($this->data);
        return true;
    }

    public function execute(): bool
    {
        if($this->UserSettingBase->isRequestChange()){
            $requestChange = $this->UserSettingBase->requestChange();
            $this->result = [];
            $this->result['providers'] = $requestChange->providers();
            $this->result['request_id'] = $requestChange->save($this->UserSettingBase);
            return true;
        }else{
            if($this->UserSettingBase->save()){
                return true;
            }
        }
        $this->errors = $this->UserSettingBase->errors();
        return false;
    }
}