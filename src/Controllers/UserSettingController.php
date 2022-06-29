<?php

namespace K1785\UserSettingRequest\Controllers;

use K1785\UserSettingRequest\Models\Records\RequestChange;
use K1785\UserSettingRequest\Models\Records\UserSetting;
use K1785\UserSettingRequest\Forms\UserSettingEditForm;
use K1785\UserSettingRequest\Models\RequestChanges\Providers\RequestProviderBase;
use K1785\UserSettingRequest\Models\RequestChanges\RequestChangeBase;


class UserSettingController extends Controller
{

    public function edit($id = null)
    {
        try {
            $vars = [];
            $auth = $this->auth();
            $authId = $auth['id'];
            $setting = new UserSetting();
            $settingUser = $setting->find(['id' => $id, 'user_id' => $authId]);
            $UserSetting = $settingUser->getType();
            $UserSettingEditForm = new UserSettingEditForm(['UserSetting' => $UserSetting]);
            if (!empty($this->request)) {
                $UserSettingEditForm->data($this->request);
                if ($UserSettingEditForm->validate()) {
                    if ($UserSettingEditForm->execute()) {
                        $vars['result'] = $UserSettingEditForm->result();
                    } else {
                        $this->error(403, $UserSettingEditForm->errors());
                    }
                } else {
                    $this->error(403, $UserSettingEditForm->errors());
                }
            }
            print_r($this->request);
            return $this->render('users/setting/edit', $vars);
        } catch (\Exception $exception) {
            $this->error($exception->getCode(), $exception->getMessage());
        }

    }

    public function send($id = null, $provider = null)
    {
        try {
            $RequestChange = new RequestChange();
            $RequestChangeBase = $RequestChange->getType($id);
            if(! $RequestChangeBase->send($provider)){
                $this->error(500, 'not send');
            }
            echo 'Success';
        } catch (\Exception $exception) {
            $this->error($exception->getCode(), $exception->getMessage());
        }
    }

    public function check($id = null)
    {
        try {
            $RequestChange = new RequestChange();
            $RequestChangeBase = $RequestChange->getType($id);
            if($RequestChangeBase->check($this->request)){
                $RequestChangeBase->complete();
            }
        } catch (\Exception $exception) {
            $this->error($exception->getCode(), $exception->getMessage());
        }
    }
}