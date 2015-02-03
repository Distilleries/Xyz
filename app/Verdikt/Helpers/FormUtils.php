<?php


namespace Verdikt\Helpers;

use Verdikt\Forms\FormView;

class FormUtils {

    public static  function prepareAttributes($options)
    {
        $attributes = [];

        foreach ($options as $name => $option) {
            if ($option !== null) {
                $attributes[] = $name.'="'.$option.'" ';
            }
        }

        return join('', $attributes);
    }

    public static function formView(FormView $form, array $options = [])
    {
        return $form->renderFormView($options);
    }

    public static function formRestView(FormView $form)
    {
        return $form->renderRestView(false);
    }

} 