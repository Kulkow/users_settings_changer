<?php

namespace K1785\UserSettingRequest\Models\RequestChanges\States;

class RequestChangeState{

    protected $new = null;
    protected $old = null;

    public function __construct($old, $new)
    {
        $this->new = $new;
        $this->old = $old;
    }

    public function getNew()
    {
        return $this->new;
    }

    public function getOld()
    {
        return $this->old;
    }
}