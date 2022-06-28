<?php

namespace K1785\UserSettingRequest\Models\Records;

class Record{


    protected $table = null;
    protected $fields = [];
    protected $belongsTo = [];

    /**
     * @param array $fields
     */
    public function __construct(array $fields = [])
    {

    }

    /**
     * @param array $conditions
     * @return Record
     */
    public function find(array $conditions = []) : Record
    {
        return new Record();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data = []) : bool
    {
        return true;
    }

    /**
     * @param $id
     * @param array $data
     * @return bool
     */
    public function update($id = null, array $data = []) : bool
    {
        return true;
    }

    public function delete($id = null) : bool
    {
        return true;
    }
}