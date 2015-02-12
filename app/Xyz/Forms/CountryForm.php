<?php namespace Xyz\Forms;

use Distilleries\Expendable\Helpers\StaticLabel;
use Distilleries\FormBuilder\FormValidator;

class CountryForm extends FormValidator {

    public static $rules = [
        'libelle' => 'required',
        'status'  => 'required|integer'
    ];

    public function buildForm()
    {
        $this
            ->add('id', 'hidden')
            ->add('libelle', 'text',[
                'validation'  => 'required',
                'label'       => _('Country')
            ])
            ->add('iso', 'text',[
                'validation'  => 'required',
                'label'       => _('ISO (ISO_3166-2)'),
                'help'       => _('AD AE AF AG AI AL AM... <a href="http://en.wikipedia.org/wiki/ISO_3166-2:AU" target="_blank">http://en.wikipedia.org/wiki/ISO_3166-2:AU</a>')
            ])
            ->add('status', 'choice', [
                'choices'     => StaticLabel::status(),
                'empty_value' => _('-'),
                'validation'  => 'required',
                'label'       => _('Status')
            ]);

        $this->addDefaultActions();
    }
}