<?php

return [

    'title' => 'Přihlášení',

    'heading' => 'Přihlásit se',

    'actions' => [

        'register' => [
            'before' => 'nebo',
            'label' => 'registrovat se',
        ],

        'request_password_reset' => [
            'label' => 'Zapomněli jste heslo?',
        ],

    ],

    'form' => [

        'email' => [
            'label' => 'Emailová adresa',
        ],

        'password' => [
            'label' => 'Heslo',
        ],

        'remember' => [
            'label' => 'Zapamatovat si mě',
        ],

        'actions' => [

            'authenticate' => [
                'label' => 'Přihlásit se',
            ],

        ],

    ],

    'messages' => [

        'failed' => 'Tato přihlašovací údaje neodpovídají našim záznamům.',

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'Příliš mnoho pokusů o přihlášení',
            'body' => 'Zkuste to prosím znovu za :seconds sekund.',
        ],

    ],

];
