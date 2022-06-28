<?php
namespace K1785\UserSettingRequest\Models\RequestChanges\Providers;

interface RequestProviderInterface{
    public function send() : bool ;
}