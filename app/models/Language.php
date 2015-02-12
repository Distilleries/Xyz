<?php

class Language extends \Distilleries\Expendable\Models\BaseModel {

    use \Distilleries\Expendable\Models\StatusTrait;

    protected $fillable = [
        'libelle',
        'iso',
        'not_visible',
        'is_default',
        'status',
    ];
}