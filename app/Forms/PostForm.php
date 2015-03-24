<?php namespace App\Forms;

use Distilleries\Expendable\Helpers\StaticLabel;
use Distilleries\FormBuilder\FormValidator;

class PostForm extends FormValidator
{
    public static $rules = [
        'libelle' => 'required',
        'status'  => 'required|integer'
    ];
    public static $rules_update = null;

    public function buildForm()
    {
        $this
            ->add('id', 'hidden')
            ->add('libelle', 'text')
            ->add('content', 'tinymce')
            ->add('status', 'choice', [
                'choices'     => StaticLabel::status(),
                'empty_value' => '-',
                'validation'  => 'required',
                'label'       => 'Status'
            ]);

         $this->addDefaultActions();
    }
}