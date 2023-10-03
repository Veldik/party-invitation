<?php

return [

    'title' => 'Registrace',

    'heading' => 'Zaregistrovat se',

    'actions' => [

        'login' => [
            'before' => 'nebo',
            'label' => 'přihlásit se ke svému účtu',
        ],

    ],

    'form' => [

        'email' => [
            'label' => 'Emailová adresa',
        ],

        'name' => [
            'label' => 'Jméno',
        ],

        'password' => [
            'label' => 'Heslo',
            'validation_attribute' => 'heslo',
        ],

        'password_confirmation' => [
            'label' => 'Potvrzení hesla',
        ],

        'actions' => [

            'register' => [
                'label' => 'Zaregistrovat se',
            ],

        ],

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'Příliš mnoho pokusů o registraci',
            'body' => 'Zkuste to prosím znovu za :seconds sekund.',
        ],

    ],

];
