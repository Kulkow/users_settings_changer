<?php
namespace K1785\UserSettingRequest\Models\Records;

use K1785\UserSettingRequest\Models\UserSettings\UserSettingBase;

class UserSetting extends Record{

    protected string $table = 'user_settings';



    protected array $fields = [
        'id',
        'user_id',
        'user_setting_type_id',
        'setting',
        'config'
    ];

    protected array $belongsTo = [
        'User' => [
            'model' => 'K1785\UserSettingRequest\Models\Records\User',
            'field' => 'user_id'
        ],
        'UserSettingType' => [
            'model' => 'K1785\UserSettingRequest\Models\Records\UserSettingType',
            'field' => 'user_setting_type_id'
        ]
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
            'user_id' => 1,
            'user_setting_type_id' => 1,
            'setting' => 'xxx@test.ru',
            'config' => '{"field" : "email"}'
        ];
        $record->data($data);
        return $record;
    }


    /**
     * @return Record
     */
    public function type() : Record
    {
        $UserSettingType = new UserSettingType();
        return $UserSettingType->find(['id' => $this->user_setting_type_id]);
    }


    public function getType($id = null) : UserSettingBase
    {
        $record = $this->find(['alias' => $id]);
        $recordType = $record->type();
        if($recordType->type){
            $config = $recordType->config ? json_decode($record->config, true) : [];
            return UserSettingBase::factory($recordType->type, $config);
        }
        throw new \Exception('Not set type for setting id '.$id);
    }
}