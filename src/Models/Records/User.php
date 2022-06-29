<?php
namespace K1785\UserSettingRequest\Models\Records;

class User extends Record{

    protected string $table = 'users';
    protected array $fields = [
        'id',
        'username',
        'email'
    ];

}