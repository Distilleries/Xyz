<?php

class Contact extends \Verdikt\Models\BaseModel {

    protected $fillable = [
        'user_id',
        'content',
        'subject',
        'name',
        'email',
        'phone'
    ];


    public function user()
    {
        return $this->hasOne('User');
    }
}