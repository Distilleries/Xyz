<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Distilleries\Expendable\Models\BaseModel implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait, \Distilleries\Expendable\Models\StatusTrait;

    protected $fillable = [
        'email',
        'password',
        'status',
        'role_id'
    ];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function role()
    {
        return $this->belongsTo('Role');
    }

    public static function boot()
    {
        parent::boot();
        User::observe(new \Distilleries\Expendable\Observers\PasswordObserver);
    }


}
