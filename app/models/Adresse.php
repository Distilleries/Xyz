<?php

class Adresse extends \Verdikt\Models\BaseModel {

    protected $fillable = [
        'profile_id',
        'road',
        'city_id',
        'country_id',
        'lat',
        'lng',
    ];


    public function profile()
    {
        return $this->hasOne('Profile');
    }

    public function city()
    {
        return $this->hasOne('City');
    }

    public function country()
    {
        return $this->hasOne('Country');
    }
}