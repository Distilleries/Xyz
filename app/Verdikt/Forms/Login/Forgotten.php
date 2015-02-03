<?php

namespace Verdikt\Forms\Login;

use Verdikt\Forms\FormValidator;

class Forgotten extends FormValidator {

    public static $rules = [
        'email'    => 'required|email'
    ];

    public function buildForm()
    {
        $this->add('email', 'email',
            [
                'label' => _('Email'),
                'validation' => 'required,custom[email]',
                'attr' => [
                    'class' => 'placeholder-no-fix',
                ],

            ])
            ->add('send', 'submit',
            [
                'label' => _('Send'),
                'attr' => [
                    'class' =>'btn green-haze pull-right'
                ],
            ]);
    }
}