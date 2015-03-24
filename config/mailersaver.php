<?php

return [

    'mail'                => [
        'template' => 'mailersaver::admin.templates.mails.default',
        'override' => [
            'enabled' => false,
            'to'      => [],
            'cc'      => [],
            'bcc'     => []
        ]
    ],
];