<?php
namespace K1785\UserSettingRequest\Forms;

interface FormInterface{

    public function execute() : bool;
    public function validate() : bool;

}