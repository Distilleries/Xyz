<?php namespace App;

use Distilleries\Expendable\Models\BaseModel;

class Post extends BaseModel {

    use \Distilleries\Expendable\Models\StatusTrait;

    protected $fillable = [
        'id',
        'libelle',
        'content',
        'status',
    ];
}