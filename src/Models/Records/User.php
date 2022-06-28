<?php
namespace K1785\UserSettingRequest\Models\Records;

class User extends Record{

    protected $table = 'users';
    protected $fields = [
        'id',
        'username',
        'email'
    ];

}