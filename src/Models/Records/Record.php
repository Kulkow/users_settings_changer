<?php

namespace K1785\UserSettingRequest\Models\Records;

class Record{


    protected string $table = '';
    protected array $fields = [];
    protected array $data = [];
    protected array $belongsTo = [];

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data($data);
    }

    public function data(array $data = [])
    {
        $this->data = $data;
    }

    public function __get($field = null)
    {
        return isset($this->data[$field]) ? $this->data[$field] : false;
    }

    /**
     * @param array $conditions
     * @return Record
     */
    public function find(array $conditions = []) : Record
    {
        $class = get_class($this);
        return new $class();
    }

    /**
     * @param array $data
     * @return int
     */
    public function create(array $data = []) : int
    {
        return 1;
    }

    /**
     * @return array
     */
    public function asArray()
    {
        return $this->data;
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