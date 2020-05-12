<?php

$menus = [
    'index.php' => [
        'title' => 'Anasayfa',
        'icon' => 'dashboard'
    ],
    'users.php' => [
        'title' => 'Üyeler',
        'icon' => 'person',
        'submenu' => [
            'users.php?operation=add' => 'Üye Ekle',

        ]
    ],
    'posts.php' => [
        'title' => 'Gönderiler',
        'icon' => 'comment',
        'submenu' => [
            'posts.php?operation=add' => 'Post Ekle',

        ]
    ],
    'importcsv.php' => [
        'title' => 'CSV Yükle',
        'icon' => 'history'
    ],
    'excelread.php' => [
        'title' => 'Excel Okut',
        'icon' => 'book'
    ],
    'settings.php' => [
        'title' => 'Ayarlar',
        'icon' => 'settings'
    ]
];

?>