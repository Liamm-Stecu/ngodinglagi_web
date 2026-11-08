<?php

return [
    'stats' => [
        'samp' => 23,
        'web' => 8,
        'editing' => 64,
    ],
    'categories' => [
        0 => [
            'slug' => 'samp',
            'title' => 'SA-MP / Open.MP',
            'description' => 'Pengembangan gamemode & server multiplayer: sistem roleplay, fitur custom, integrasi database, dan optimasi performa.',
            'items' => [
                0 => 'Gamemode & sistem roleplay',
                1 => 'Scripting Pawn / Open.MP',
                2 => 'Integrasi MySQL & UCP',
                3 => 'Debugging & optimasi server',
            ],
        ],
        1 => [
            'slug' => 'web',
            'title' => 'Website',
            'description' => 'Pembuatan website dari nol: landing, company profile, sampai custom — fokus ngoding.',
            'items' => [
                0 => 'Company profile & landing page',
                1 => 'Custom fitur & integrasi',
                2 => 'Responsif & SEO dasar',
                3 => 'Integrasi kebutuhan bisnis',
            ],
        ],
        2 => [
            'slug' => 'vps',
            'title' => 'VPS Administrator',
            'description' => 'Administrasi VPS: update & patch, monitoring, backup, keamanan dasar, dan troubleshooting.',
            'items' => [
                0 => 'Update & patch rutin',
                1 => 'Monitoring & uptime',
                2 => 'Backup & recovery',
                3 => 'Keamanan dasar & troubleshooting',
            ],
        ],
    ],
];
