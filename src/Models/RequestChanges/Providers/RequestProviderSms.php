<?php
namespace K1785\UserSettingRequest\Models\RequestChanges\Providers;

class RequestProviderSms extends RequestProviderBase implements RequestProviderInterface{


    public function send() : bool
    {
        return true;
    }
}