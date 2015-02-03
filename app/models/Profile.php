<?php

class Profile extends \Verdikt\Models\BaseModel {
	protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'company_name',
        'description',
        'phone'
    ];


    public function user()
    {
        return $this->hasOne('User');
    }
}