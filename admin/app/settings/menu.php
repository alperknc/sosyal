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
        'icon' => 'settings',
        'submenu' => [
            'posts.php?operation=add' => 'Post Ekle',

        ]
    ],
    'settings.php' => [
        'title' => 'Ayarlar',
        'icon' => 'settings'
    ]
];

?>