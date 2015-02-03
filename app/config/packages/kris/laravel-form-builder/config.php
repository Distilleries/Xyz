<?php

return [
    'defaults'      => [
        'wrapper_class'       => 'form-group',
        'wrapper_error_class' => 'has-error',
        'label_class'         => 'control-label',
        'field_class'         => 'form-control',
        'error_class'         => 'help-block text-danger'
    ],
    // Templates
    'form'          => 'admin.form.partial.form',
    'text'          => 'admin.form.partial.text',
    'textarea'      => 'admin.form.partial.textarea',
    'button'        => 'admin.form.partial.button',
    'radio'         => 'admin.form.partial.radio',
    'checkbox'      => 'admin.form.partial.checkbox',
    'select'        => 'admin.form.partial.select',
    'choice'        => 'admin.form.partial.choice',
    'repeated'      => 'admin.form.partial.repeated',
    'child_form'    => 'admin.form.partial.child_form',
    'tinymce'       => 'admin.form.partial.tinymce',
    'tag'           => 'admin.form.partial.tag',
    'choice_area'   => 'admin.form.partial.choice_area',

    'custom_fields' => [
        'button'      => 'Verdikt\Fields\ButtonType',
        'checkbox'    => 'Verdikt\Fields\CheckableType',
        'text'        => 'Verdikt\Fields\InputType',
        'email'       => 'Verdikt\Fields\InputType',
        'number'      => 'Verdikt\Fields\InputType',
        'select'      => 'Verdikt\Fields\SelectType',
        'textarea'    => 'Verdikt\Fields\TextareaType',
        'tinymce'     => 'Verdikt\Fields\Tinymce',
        'tag'         => 'Verdikt\Fields\Tag',
        'choice'      => 'Verdikt\Fields\ChoiceType',
        'form'        => 'Verdikt\Fields\ChildFormType',
        'choice_area' => 'Verdikt\Fields\ChoiceArea'
    ]
];
