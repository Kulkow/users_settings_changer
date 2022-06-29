<?php
namespace K1785\UserSettingRequest\Controllers;
use K1785\UserSettingRequest\Models\Records\UserSetting;
use K1785\UserSettingRequest\Forms\UserSettingEditForm;
use K1785\UserSettingRequest\Models\UserSettings\UserSettingBase;
use K1785\UserSettingRequest\Views\View;

class UserSettingController extends Controller{


    public function edit($id = null)
    {
        try{
            $auth = $this->auth();
            $authId = $auth['id'];
            $setting = new UserSetting();
            $settingUser = $setting->find(['id' => $id]);
            $UserSetting = $settingUser->getType();

            $UserSettingEditForm = new UserSettingEditForm();
            //$UserSettingEditForm->data($settingUser);
            return $this->render('users/setting/edit');
        }catch (\Exception $exception){
            $this->error($exception->getCode(), $exception->getMessage());
        }

    }
}