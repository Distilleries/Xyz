<?php namespace Verdikt\Forms\Permission;

use Verdikt\Forms\FormValidator;

class PermissionForm extends FormValidator {

    public function buildForm()
    {
        $areas          = $this->model->getArea();
        $areas_selected = $this->model->getAreaSelected();

        $this->add('permission', 'choice_area', [
            'choices'  => $areas,
            'selected' => $areas_selected
        ]);
        $this->addDefaultActions();
    }
}