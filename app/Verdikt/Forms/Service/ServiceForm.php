<?php namespace Verdikt\Forms\Service;

use Verdikt\Forms\FormValidator;

class ServiceForm extends FormValidator {

    public static $rules = [
        'action' => 'required|unique:services'
    ];

    public function buildForm()
    {
        $this
            ->add('id', 'hidden')
            ->add('action', 'text');

        $this->addDefaultActions();
    }
}