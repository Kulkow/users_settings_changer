<?php
namespace K1785\UserSettingRequest\Forms;

abstract class Form implements FormInterface {

    protected $data = [];
    protected $errors = [];
    protected $result = '';

    public function data(array $data = [])
    {
        $this->data = $data;
    }

    public function errors() : array
    {
        return $this->errors;
    }

    public function result() : string
    {
        return $this->result;
    }
}