<?php
namespace K1785\UserSettingRequest\Models\RequestChanges;

interface RequestChangeInterface{

    public function hash() : string ;
    public function providers() : array ;
    public function check($request) : bool ;
    public function send($provider) : bool ;
    public function complete() : bool ;
}