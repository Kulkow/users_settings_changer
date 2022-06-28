<?php
namespace K1785\UserSettingRequest\Models\RequestChanges;

interface RequestChangeInterface{

    public function hash() : string ;
    public function providers() : array ;
    public function check() : bool ;
}