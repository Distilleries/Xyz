<?php

return [

    'Verdikt\Contracts\DatatableStateContract' => [
        'color'            => 'bg-green-haze',
        'icon'             => 'th-list',
        'libelle'          => _('Datatable'),
        'extended_libelle' => _('List of %s'),
        'action'           => 'getIndex'
    ],
    'Verdikt\Contracts\FormStateContract'      => [
        'color'   => 'bg-yellow',
        'icon'    => 'pencil',
        'libelle' => _('Add'),
        'extended_libelle' => _('Detail of %s'),
        'action'  => 'getEdit'
    ]
];