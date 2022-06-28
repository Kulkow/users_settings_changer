<?php
namespace K1785\UserSettingRequest\Models\Records;

class RequestChangeStorage extends Record{

    protected $table = 'request_change_storages';
    protected $fields = [
        'id',
        'old',
        'new',
    ];
}