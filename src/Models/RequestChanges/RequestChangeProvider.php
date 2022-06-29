<?php
namespace K1785\UserSettingRequest\Models\RequestChanges;

use K1785\UserSettingRequest\Models\RequestChanges\Providers\RequestProviderBase;

class RequestChangeProvider extends RequestChangeBase implements RequestChangeInterface{

    protected $salt = 'xxsdfswerwe';

    public function hash() : string
    {
        return md5(uniqid().'-'.uniqid().'-'.uniqid().'-'.$this->salt);
    }

    public function providers() : array
    {
        return ['Sms', 'Email', 'Telegramm'];
    }

    public function check($request) : bool
    {
        if(empty($request['hash'])){
            return false;
        }
        return $request['hash'] == $this->record->id;
    }

    public function send($provider) : bool
    {
        $sender = RequestProviderBase::factory($provider);
        return $sender->send();
    }

    public function complete() : bool
    {
        //save setting
        return true;
    }


}