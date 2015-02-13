<?php

class Country extends \Distilleries\Expendable\Models\BaseModel {

    use  \Distilleries\Expendable\Models\StatusTrait;

    protected $fillable = [
        'libelle',
        'iso',
        'status'
    ];

    public function cities()
    {
        return $this->hasMany('City');
    }
}