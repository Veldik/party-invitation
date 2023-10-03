<?php

return [

    'title' => 'Ověřte svou emailovou adresu',

    'heading' => 'Ověřte svou emailovou adresu',

    'actions' => [

        'resend_notification' => [
            'label' => 'Znovu odeslat',
        ],

    ],

    'messages' => [
        'notification_not_received' => 'Nepřišel vám email, který jsme poslali?',
        'notification_sent' => 'Poslali jsme vám email na adresu :email s instrukcemi, jak ověřit svou emailovou adresu.',
    ],

    'notifications' => [

        'notification_resent' => [
            'title' => 'Email byl znovu odeslán.',
        ],

        'notification_resend_throttled' => [
            'title' => 'Příliš mnoho pokusů o opětovné odeslání',
            'body' => 'Zkuste to prosím znovu za :seconds sekund.',
        ],

    ],

];
