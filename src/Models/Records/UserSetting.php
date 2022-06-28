<?php
namespace K1785\UserSettingRequest\Models\Records;

class UserSetting extends Record{

    protected $table = 'user_settings';

    protected $fields = [
        'id',
        'user_id',
        'user_setting_type_id',
        'setting'
    ];

    protected $belongsTo = [
        'User' => [
            'model' => 'K1785\UserSettingRequest\Models\Records\User',
            'field' => 'user_id'
        ],
        'UserSettingType' => [
            'model' => 'K1785\UserSettingRequest\Models\Records\UserSettingType',
            'field' => 'user_setting_type_id'
        ]
    ];
}