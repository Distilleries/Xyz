<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Mail Driver
    |--------------------------------------------------------------------------
    |
    | Laravel supports both SMTP and PHP's "mail" function as drivers for the
    | sending of e-mail. You may specify which one you're using throughout
    | your application here. By default, Laravel is setup for SMTP mail.
    |
    | Supported: "smtp", "mail", "sendmail", "mailgun", "mandrill", "log"
    |
    */

    'driver'     => 'mail',



    'override'    => [
        'enabled' => true,
        'to'      => ['maxime@verdikt.com.au'],
        'cc'      => ['maxime@verdikt.com.au'],
        'bcc'     => ['maxime@verdikt.com.au']
    ]
);
