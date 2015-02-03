<?php

class Language extends \Verdikt\Models\BaseModel {

    use \Verdikt\Models\StatusTrait;

    protected $fillable = [
        'libelle',
        'iso',
        'not_visible',
        'is_default',
        'status',
    ];
}