<?php

class Role extends \Distilleries\Expendable\Models\BaseModel {

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

    public function scopeClinic()
    {
        return $this->where('initials', '=', '@cl');
    }

    public function scopeCustomer()
    {
        return $this->where('initials', '=', '@cu');
    }
}