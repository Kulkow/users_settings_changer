<?php
namespace K1785\UserSettingRequest\Models\UserSettings;

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
    public function requestChange() : bool ;
}