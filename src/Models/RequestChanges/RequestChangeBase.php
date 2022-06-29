<?php
namespace K1785\UserSettingRequest\Models\RequestChanges;

use K1785\UserSettingRequest\Models\Records\Record;
use K1785\UserSettingRequest\Models\Records\RequestChange;
use K1785\UserSettingRequest\Models\Records\RequestChangeStorage;
use K1785\UserSettingRequest\Models\UserSettings\UserSettingBase;

abstract class RequestChangeBase implements RequestChangeInterface{

    protected $record;

    public function setRecord(Record $record)
    {
        $this->record = $record;
    }

    public function record() : Record
    {
        return $this->record;
    }

    protected $lifetime = '+1day';

    public function save(UserSettingBase $UserSettingBase)
    {
        $record = $UserSettingBase->record();
        $data = $UserSettingBase->data();
        //храним что изменить
        $RequestChangeStorage = new RequestChangeStorage([
            'old' => $record->asArray(),
            'new' => $data,
        ]);
        $request_change_storage_id = $RequestChangeStorage->create();
        if(! $request_change_storage_id){
            throw new \Exception('Not save Change Storage');
        }
        //Запрос
        $RequestChange = new RequestChange([
            'user_id' => $record->user_id,
            'type' => $UserSettingBase->type(),
            'hash' => $this->hash(),
            'lifetime' => strtotime($this->lifetime),
            'request_change_storage_id' => $request_change_storage_id,
            'status' => 0, //add constant
        ]);
        return $RequestChange->create();
    }
}