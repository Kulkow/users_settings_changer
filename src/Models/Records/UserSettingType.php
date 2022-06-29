<?php
namespace K1785\UserSettingRequest\Models\Records;

use K1785\UserSettingRequest\Models\UserSettings\UserSettingBase;

class UserSettingType extends Record{

    protected string $table = 'user_setting_types';

    protected array $fields = [
        'id',
        'alias',
        'title',
        'type',

    ];

    /**
     * @param array $conditions
     * @return Record
     */
    public function find(array $conditions = []) : Record
    {
        $record = parent::find($conditions);
        $data = [
            'id' => 1,
            'alias' => 'email',
            'title' => 'E-mail',
            'type' => 'Field',
        ];
        $record->data($data);
        return $record;
    }



}