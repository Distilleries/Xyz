<?php namespace App\Http\Forms;

use Distilleries\FormBuilder\FormValidator;

class LaguageForm extends FormValidator
{
    public static $rules        = [];
    public static $rules_update = null;

    public function buildForm()
    {
        $this
            ->add('id', 'hidden');

         $this->addDefaultActions();
    }
}