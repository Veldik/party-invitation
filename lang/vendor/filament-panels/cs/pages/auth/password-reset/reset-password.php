<?php

return [

    'title' => 'Obnovení hesla',

    'heading' => 'Obnovení hesla',

    'form' => [

        'email' => [
            'label' => 'Emailová adresa',
        ],

        'password' => [
            'label' => 'Heslo',
            'validation_attribute' => 'heslo',
        ],

        'password_confirmation' => [
            'label' => 'Potvrzení hesla',
        ],

        'actions' => [

            'reset' => [
                'label' => 'Obnovit heslo',
            ],

        ],

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'Příliš mnoho pokusů o obnovení',
            'body' => 'Zkuste to prosím znovu za :seconds sekund.',
        ],

    ],

];
