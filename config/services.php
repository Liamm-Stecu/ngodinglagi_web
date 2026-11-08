<?php

return [
    'postmark' => [
        'token' => null,
    ],
    'resend' => [
        'key' => null,
    ],
    'ses' => [
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],
    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => null,
            'channel' => null,
        ],
    ],
    'services' => [
        0 => [
            'slug' => 'web',
            'title' => 'Web Development & Deployment',
            'short' => 'Pembuatan website, deployment, domain, SSL, maintenance, dan troubleshooting.',
            'description' => 'Dari landing page sampai website bisnis: dibuat, di-deploy, domain & SSL diurus, dan tetap dirawat kalau ada masalah.',
            'for' => [
                0 => 'Bisnis / UMKM butuh website',
                1 => 'Butuh redesign atau maintenance',
                2 => 'Sudah punya domain & butuh hosting',
            ],
            'items' => [
                0 => 'Company profile & landing page',
                1 => 'Deployment domain & SSL',
                2 => 'Maintenance berkala',
                3 => 'Troubleshooting error website',
            ],
            'pricing' => [
                'label' => 'Mulai dari',
                'tiers' => [
                    0 => [
                        'name' => 'Landing Page',
                        'price' => 'Rp 750.000',
                        'note' => '1 halaman, responsif, form kontak',
                    ],
                    1 => [
                        'name' => 'Company Profile',
                        'price' => 'Rp 1.500.000',
                        'note' => '3–5 halaman, SEO dasar',
                    ],
                    2 => [
                        'name' => 'Custom Website',
                        'price' => 'Rp 3.000.000+',
                        'note' => 'Sesuai kebutuhan & fitur',
                    ],
                ],
            ],
        ],
        1 => [
            'slug' => 'samp',
            'title' => 'SA-MP / Open.MP Development',
            'short' => 'Scripting Pawn, sistem roleplay, MySQL, UCP, debugging, dan optimasi.',
            'description' => 'Pengembangan server multiplayer: gamemode, fitur custom, integrasi database, sampai optimasi performa biar player nyaman.',
            'for' => [
                0 => 'Komunitas / server roleplay',
                1 => 'Butuh fitur custom Pawn',
                2 => 'Server sering lag / crash',
            ],
            'items' => [
                0 => 'Gamemode & sistem roleplay',
                1 => 'Scripting Pawn / Open.MP',
                2 => 'Integrasi MySQL & UCP',
                3 => 'Debugging & optimasi server',
            ],
            'pricing' => [
                'label' => 'Mulai dari',
                'tiers' => [
                    0 => [
                        'name' => 'Script Fitur',
                        'price' => 'Rp 150.000',
                        'note' => 'Per fitur / command custom',
                    ],
                    1 => [
                        'name' => 'Setup Server',
                        'price' => 'Rp 500.000',
                        'note' => 'Install, config, MySQL, dasar',
                    ],
                    2 => [
                        'name' => 'Full Development',
                        'price' => 'Rp 2.000.000+',
                        'note' => 'Gamemode / sistem besar',
                    ],
                ],
            ],
        ],
        2 => [
            'slug' => 'vps',
            'title' => 'VPS & Server Administration',
            'short' => 'Setup Linux, panel, web server, keamanan dasar, backup, dan troubleshooting.',
            'description' => 'Setup infrastruktur Linux untuk web atau game server: panel, web server, security dasar, backup, sampai recovery.',
            'for' => [
                0 => 'Butuh VPS tapi bingung setup',
                1 => 'Game server / web server production',
                2 => 'Perlu panel & backup yang rapi',
            ],
            'items' => [
                0 => 'Setup VPS Linux',
                1 => 'Panel: CloudPanel / Pterodactyl',
                2 => 'Web server & security dasar',
                3 => 'Backup & recovery',
            ],
            'pricing' => [
                'label' => 'Mulai dari',
                'tiers' => [
                    0 => [
                        'name' => 'Setup VPS',
                        'price' => 'Rp 250.000',
                        'note' => 'Install OS, hardening, akses',
                    ],
                    1 => [
                        'name' => 'Panel + Web Server',
                        'price' => 'Rp 500.000',
                        'note' => 'CloudPanel / Nginx / SSL',
                    ],
                    2 => [
                        'name' => 'Admin Bulanan',
                        'price' => 'Rp 750.000/bln',
                        'note' => 'Monitoring, update, backup',
                    ],
                ],
            ],
        ],
        3 => [
            'slug' => 'editing',
            'title' => 'Video & Photo Editing',
            'short' => 'Editing video & foto: montase, konten sosial, thumbnail, color grading, dan retouch.',
            'description' => 'Editing video dan foto untuk konten: montase, short-form, thumbnail YouTube, color grading, sampai retouch foto — hasil rapi siap tayang.',
            'for' => [
                0 => 'Kreator konten butuh editor langganan',
                1 => 'Butuh thumbnail & video promosi',
                2 => 'Foto produk / profil perlu dirapikan',
            ],
            'items' => [
                0 => 'Video editing & montase',
                1 => 'Short-form: Reels / TikTok / Shorts',
                2 => 'Photo editing & retouch',
                3 => 'Thumbnail & konten sosial',
            ],
            'pricing' => [
                'label' => 'Mulai dari',
                'tiers' => [
                    0 => [
                        'name' => 'Photo Editing',
                        'price' => 'Rp 50.000',
                        'note' => 'Retouch & color grading / foto',
                    ],
                    1 => [
                        'name' => 'Short-Form Video',
                        'price' => 'Rp 150.000',
                        'note' => 'Reels / TikTok / Shorts ≤60 dtk',
                    ],
                    2 => [
                        'name' => 'Long-Form Video',
                        'price' => 'Rp 500.000+',
                        'note' => 'YouTube / montase, durasi fleksibel',
                    ],
                ],
            ],
        ],
    ],
];
