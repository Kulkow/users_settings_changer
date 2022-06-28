<?php
namespace K1785\UserSettingRequest\Models\Records;

class RequestChange extends Record{

    protected $table = 'request_changes';
    protected $fields = [
        'id',
        'user_id',
        'type',
        'hash',
        'lifetime',
        'request_change_storage_id',
        'status'
    ];

    protected $belongsTo = [
        'User' => [
            'model' => 'K1785\UserSettingRequest\Models\Records\User',
            'field' => 'user_id'
        ],
        'RequestChangeStorage' => [
            'model' => 'K1785\UserSettingRequest\Models\Records\RequestChangeStorage',
            'field' => 'request_change_storage_id'
        ]
    ];

}