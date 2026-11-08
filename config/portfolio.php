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
            'description' => 'Pembuatan dan perawatan website: landing, company profile, sampai deployment domain, SSL, dan maintenance.',
            'items' => [
                0 => 'Company profile & landing page',
                1 => 'Deployment domain & SSL',
                2 => 'Maintenance & troubleshooting',
                3 => 'Integrasi kebutuhan bisnis',
            ],
        ],
        2 => [
            'slug' => 'vps',
            'title' => 'VPS & Server',
            'description' => 'Setup dan administrasi infrastruktur Linux untuk web dan game server.',
            'items' => [
                0 => 'Setup VPS Linux',
                1 => 'Panel: CloudPanel / Pterodactyl',
                2 => 'Web server & security dasar',
                3 => 'Backup & recovery',
            ],
        ],
    ],
];
