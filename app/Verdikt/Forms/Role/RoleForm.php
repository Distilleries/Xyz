<?php namespace Verdikt\Forms\Role;

use Verdikt\Forms\FormValidator;
use Verdikt\Helpers\StaticLabel;

class RoleForm extends FormValidator {

    public static $rules = [
        'libelle'            => 'required',
        'initials'           => 'required|unique:roles',
        'overide_permission' => 'integer'
    ];


    public function buildForm()
    {
        $this
            ->add('id', 'hidden')
            ->add('libelle', 'text', [
                'validation' => 'required',
                'label'      => _('Libelle')
            ])
            ->add('initials', 'text', [
                'validation' => 'required',
                'label'      => _('Initials')
            ])
            ->add('overide_permission', 'choice', [
                'choices'     => StaticLabel::yesNo(),
                'empty_value' => _('-'),
                'validation'  => 'required',
                'label'       => _('Allow automatically all permission')
            ]);

        $this->addDefaultActions();
    }
}