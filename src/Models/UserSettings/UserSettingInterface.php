<?php
namespace K1785\UserSettingRequest\Models\UserSettings;

use K1785\UserSettingRequest\Models\RequestChanges\RequestChangeBase;

interface UserSettingInterface{

    /**
     * @return array
     */
    public function fields() : array ;


    /**
     * @param array $data
     * @return bool
     */
    public function validate(array $data = []) : bool ;

    /**
     * @return bool
     */
    public function isRequestChange() : bool ;

    public function requestChange() : RequestChangeBase ;

    public function save() : bool ;
}