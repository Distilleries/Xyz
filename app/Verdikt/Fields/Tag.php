<?php


namespace Verdikt\Fields;


use Kris\LaravelFormBuilder\Fields\FormField;

class Tag extends FormFieldsView {

    protected function getTemplate()
    {
        return 'tag';
    }
} 