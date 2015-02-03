<?php

class Role extends \Verdikt\Models\BaseModel {

    protected $fillable = [
        'libelle',
        'initials'
    ];

    public function user()
    {
        return $this->hasOne('User');
    }

    public function permissions()
    {
        return $this->hasMany('Permission');
    }
}