<?php


namespace Verdikt\Forms\Component;

use Verdikt\Forms\FormValidator;
use Verdikt\Helpers\StaticLabel;
use \File;

class ComponentForm extends FormValidator {

    public function buildForm()
    {
            $this
                ->add('libelle', 'text', [
                    'validation' => 'required',
                    'label'      => _('Name')
                ])
                ->add('state', 'choice', [
                    'choices'     => StaticLabel::states(),
                    'empty_value' => _('-'),
                    'label'       => _('State'),
                    'expanded' => true,
                    'multiple' => true
                ])
                ->add('models', 'choice', [
                    'choices'     => $this->getChoiceModels(),
                    'empty_value' => _('-'),
                    'label'       => _('Model')
                ])
                ->add('colon_datatable', 'tag', [
                    'label' => _('Columns')
                ])
                ->add('fields_form', 'tag', [
                    'label' => _('Fields')
                ])
                ->addDefaultActions();
    }

    protected function getChoiceModels()
    {
        $models = File::files(app_path() . DIRECTORY_SEPARATOR . 'models');

        $choices = [];
        foreach($models as $model){
            $choice = explode('/',$model);
            $model = preg_replace('/.php/i','',last($choice));
            $choices[$model] = $model;
        }
        return $choices;
    }
} 