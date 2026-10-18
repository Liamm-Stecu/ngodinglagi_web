<?php

return [

    'services' => [
        [
            'slug' => 'web',
            'title' => 'Web Development & Deployment',
            'short' => 'Pembuatan website, deployment, domain, SSL, maintenance, dan troubleshooting.',
            'description' => 'Dari landing page sampai website bisnis: dibuat, di-deploy, domain & SSL diurus, dan tetap dirawat kalau ada masalah.',
            'for' => [
                'Bisnis / UMKM butuh website',
                'Butuh redesign atau maintenance',
                'Sudah punya domain & butuh hosting',
            ],
            'items' => [
                'Company profile & landing page',
                'Deployment domain & SSL',
                'Maintenance berkala',
                'Troubleshooting error website',
            ],
            'pricing' => [
                'label' => 'Mulai dari',
                'tiers' => [
                    ['name' => 'Landing Page', 'price' => 'Rp 750.000', 'note' => '1 halaman, responsif, form kontak'],
                    ['name' => 'Company Profile', 'price' => 'Rp 1.500.000', 'note' => '3–5 halaman, SEO dasar'],
                    ['name' => 'Custom Website', 'price' => 'Rp 3.000.000+', 'note' => 'Sesuai kebutuhan & fitur'],
                ],
            ],
        ],
        [
            'slug' => 'samp',
            'title' => 'SA-MP / Open.MP Development',
            'short' => 'Scripting Pawn, sistem roleplay, MySQL, UCP, debugging, dan optimasi.',
            'description' => 'Pengembangan server multiplayer: gamemode, fitur custom, integrasi database, sampai optimasi performa biar player nyaman.',
            'for' => [
                'Komunitas / server roleplay',
                'Butuh fitur custom Pawn',
                'Server sering lag / crash',
            ],
            'items' => [
                'Gamemode & sistem roleplay',
                'Scripting Pawn / Open.MP',
                'Integrasi MySQL & UCP',
                'Debugging & optimasi server',
            ],
            'pricing' => [
                'label' => 'Mulai dari',
                'tiers' => [
                    ['name' => 'Script Fitur', 'price' => 'Rp 150.000', 'note' => 'Per fitur / command custom'],
                    ['name' => 'Setup Server', 'price' => 'Rp 500.000', 'note' => 'Install, config, MySQL, dasar'],
                    ['name' => 'Full Development', 'price' => 'Rp 2.000.000+', 'note' => 'Gamemode / sistem besar'],
                ],
            ],
        ],
        [
            'slug' => 'vps',
            'title' => 'VPS & Server Administration',
            'short' => 'Setup Linux, panel, web server, keamanan dasar, backup, dan troubleshooting.',
            'description' => 'Setup infrastruktur Linux untuk web atau game server: panel, web server, security dasar, backup, sampai recovery.',
            'for' => [
                'Butuh VPS tapi bingung setup',
                'Game server / web server production',
                'Perlu panel & backup yang rapi',
            ],
            'items' => [
                'Setup VPS Linux',
                'Panel: CloudPanel / Pterodactyl',
                'Web server & security dasar',
                'Backup & recovery',
            ],
            'pricing' => [
                'label' => 'Mulai dari',
                'tiers' => [
                    ['name' => 'Setup VPS', 'price' => 'Rp 250.000', 'note' => 'Install OS, hardening, akses'],
                    ['name' => 'Panel + Web Server', 'price' => 'Rp 500.000', 'note' => 'CloudPanel / Nginx / SSL'],
                    ['name' => 'Admin Bulanan', 'price' => 'Rp 750.000/bln', 'note' => 'Monitoring, update, backup'],
                ],
            ],
        ],
    ],

];
