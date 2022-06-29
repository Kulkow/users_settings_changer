<?php
namespace K1785\UserSettingRequest\Models\Records;

class RequestChangeStorage extends Record{

    protected string $table = 'request_change_storages';
    protected array $fields = [
        'id',
        'old',
        'new',
    ];
}