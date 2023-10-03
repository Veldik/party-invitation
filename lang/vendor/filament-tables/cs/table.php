<?php

return [

    'column_toggle' => [

        'heading' => 'Sloupce',

    ],

    'columns' => [

        'text' => [
            'more_list_items' => 'a :count dalších',
        ],

    ],

    'fields' => [

        'bulk_select_page' => [
            'label' => 'Vybrat/zrušit výběr všech položek pro hromadné akce.',
        ],

        'bulk_select_record' => [
            'label' => 'Vybrat/zrušit výběr položky :key pro hromadné akce.',
        ],

        'search' => [
            'label' => 'Hledat',
            'placeholder' => 'Hledat',
            'indicator' => 'Hledat',
        ],

    ],

    'summary' => [

        'heading' => 'Souhrn',

        'subheadings' => [
            'all' => 'Všechny :label',
            'group' => ':group souhrn',
            'page' => 'Tato stránka',
        ],

        'summarizers' => [

            'average' => [
                'label' => 'Průměr',
            ],

            'count' => [
                'label' => 'Počet',
            ],

            'sum' => [
                'label' => 'Součet',
            ],

        ],

    ],

    'actions' => [

        'disable_reordering' => [
            'label' => 'Dokončit přeuspořádávání záznamů',
        ],

        'enable_reordering' => [
            'label' => 'Přeuspořádat záznamy',
        ],

        'filter' => [
            'label' => 'Filtr',
        ],

        'group' => [
            'label' => 'Skupina',
        ],

        'open_bulk_actions' => [
            'label' => 'Hromadné akce',
        ],

        'toggle_columns' => [
            'label' => 'Zobrazit/skrýt sloupce',
        ],

    ],

    'empty' => [

        'heading' => 'Žádné :model',

        'description' => 'Pro začátek vytvořte :model.',

    ],

    'filters' => [

        'actions' => [

            'remove' => [
                'label' => 'Odebrat filtr',
            ],

            'remove_all' => [
                'label' => 'Odebrat všechny filtry',
                'tooltip' => 'Odebrat všechny filtry',
            ],

            'reset' => [
                'label' => 'Obnovit',
            ],

        ],

        'heading' => 'Filtry',

        'indicator' => 'Aktivní filtry',

        'multi_select' => [
            'placeholder' => 'Vše',
        ],

        'select' => [
            'placeholder' => 'Vše',
        ],

        'trashed' => [

            'label' => 'Smazané záznamy',

            'only_trashed' => 'Pouze smazané záznamy',

            'with_trashed' => 'Se smazanými záznamy',

            'without_trashed' => 'Bez smazaných záznamů',

        ],

    ],

    'grouping' => [

        'fields' => [

            'group' => [
                'label' => 'Seskupit podle',
                'placeholder' => 'Seskupit podle',
            ],

            'direction' => [

                'label' => 'Směr seskupení',

                'options' => [
                    'asc' => 'Vzestupně',
                    'desc' => 'Sestupně',
                ],

            ],

        ],

    ],

    'reorder_indicator' => 'Přesuňte záznamy přetažením.',

    'selection_indicator' => [

        'selected_count' => '1 záznam vybrán|:count záznamy vybrány',

        'actions' => [

            'select_all' => [
                'label' => 'Vybrat všechny (:count)',
            ],

            'deselect_all' => [
                'label' => 'Zrušit výběr všech',
            ],

        ],

    ],

    'sorting' => [

        'fields' => [

            'column' => [
                'label' => 'Řadit podle',
            ],

            'direction' => [

                'label' => 'Směr řazení',

                'options' => [
                    'asc' => 'Vzestupně',
                    'desc' => 'Sestupně',
                ],

            ],

        ],

    ],

];
