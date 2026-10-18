<?php

return [

    'stats' => [
        'samp' => 23,
        'web' => 8,
    ],

    'categories' => [
        [
            'slug' => 'samp',
            'title' => 'SA-MP / Open.MP',
            'description' => 'Pengembangan gamemode & server multiplayer: sistem roleplay, fitur custom, integrasi database, dan optimasi performa.',
            'items' => [
                'Gamemode & sistem roleplay',
                'Scripting Pawn / Open.MP',
                'Integrasi MySQL & UCP',
                'Debugging & optimasi server',
            ],
        ],
        [
            'slug' => 'web',
            'title' => 'Website',
            'description' => 'Pembuatan dan perawatan website: landing, company profile, sampai deployment domain, SSL, dan maintenance.',
            'items' => [
                'Company profile & landing page',
                'Deployment domain & SSL',
                'Maintenance & troubleshooting',
                'Integrasi kebutuhan bisnis',
            ],
        ],
        [
            'slug' => 'vps',
            'title' => 'VPS & Server',
            'description' => 'Setup dan administrasi infrastruktur Linux untuk web dan game server.',
            'items' => [
                'Setup VPS Linux',
                'Panel: CloudPanel / Pterodactyl',
                'Web server & security dasar',
                'Backup & recovery',
            ],
        ],
    ],

];
