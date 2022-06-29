<?php
namespace K1785\UserSettingRequest\Forms;

use K1785\UserSettingRequest\Models\UserSettings\UserSettingField;

/**
 * @property UserSettingField $UserSettingField
 */
class UserSettingEditForm extends Form implements FormInterface {

    public function __construct()
    {

        $this->UserSettingField = new UserSettingField(['field' => 'email']);
    }

    public function validate(): bool
    {
        if(! $this->UserSettingField->validate($this->data)){
            $this->errors = $this->UserSettingField->errors();
            return false;
        }
        $this->UserSettingField->setting($this->data);
        return true;
    }

    public function execute(): bool
    {
        if($requestChange = $this->UserSettingField->requestChange()){

        }
        return true;
    }
}