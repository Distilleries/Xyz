<?php

class Service extends \Verdikt\Models\BaseModel {

    protected $fillable = ['id'];

    public function permissions()
    {
        return $this->hasMany('Permission');
    }

    public function getByAction($action){
        return $this->where('action','=',$action)->get();
    }
}