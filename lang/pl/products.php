<?php

/*
|--------------------------------------------------------------------------
| Authentication Language Lines
|--------------------------------------------------------------------------
|
| The following language lines are used during authentication for various
| messages that we need to display to the user. You are free to modify
| these language lines according to your application's requirements.
|
*/

return [
    'welcome' => [
        'categories' => 'Kategorie',
        'products' => "Produkty",
        'filter' => "Filtruj"
    ],
   'columns' => [
     'actions' => 'Akcje'
   ],
    'messages' => [
      'delete_confirm' => "Czy na pewno chcesz usunąć rekord?"
    ],
    'button' => [
      'save' => 'Zapisz',
      'add' => "Dodaj",
        'remove' => "Usuń",
        'overview' => "podgląd",
        'edit' => "Edytuj"
    ],
    'product' => [
        'add_title' => 'Dodawanie produktu',
        'edit_title' => 'Edycja produktu: :name',
        'show_title' => 'Podgląd produktu',
        'index_title' => 'Lista produktów',
        'status' => [
          'stored' => 'Produkt przechowany',
          'updated' => 'Produkt zaktualizowany',
            'delete_success' => 'Produkt usunięty.'
        ],
        'fields' => [
            'name' => 'Nazwa',
            'description' => 'Opis',
            'amount' => "Ilość",
            'price' => "Cena",
            'category' => "Kategoria",
            'image' => "Grafika"
        ]
    ]
];
