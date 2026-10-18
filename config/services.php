<?php

return array (
  'postmark' => 
  array (
    'token' => NULL,
  ),
  'resend' => 
  array (
    'key' => NULL,
  ),
  'ses' => 
  array (
    'key' => '',
    'secret' => '',
    'region' => 'us-east-1',
  ),
  'slack' => 
  array (
    'notifications' => 
    array (
      'bot_user_oauth_token' => NULL,
      'channel' => NULL,
    ),
  ),
  'services' => 
  array (
    0 => 
    array (
      'slug' => 'web',
      'title' => 'Web Development & Deployment',
      'short' => 'Pembuatan website, deployment, domain, SSL, maintenance, dan troubleshooting.',
      'description' => 'Dari landing page sampai website bisnis: dibuat, di-deploy, domain & SSL diurus, dan tetap dirawat kalau ada masalah.',
      'for' => 
      array (
        0 => 'Bisnis / UMKM butuh website',
        1 => 'Butuh redesign atau maintenance',
        2 => 'Sudah punya domain & butuh hosting',
      ),
      'items' => 
      array (
        0 => 'Company profile & landing page',
        1 => 'Deployment domain & SSL',
        2 => 'Maintenance berkala',
        3 => 'Troubleshooting error website',
      ),
      'pricing' => 
      array (
        'label' => 'Mulai dari',
        'tiers' => 
        array (
          0 => 
          array (
            'name' => 'Landing Page',
            'price' => 'Rp 750.000',
            'note' => '1 halaman, responsif, form kontak',
          ),
          1 => 
          array (
            'name' => 'Company Profile',
            'price' => 'Rp 1.500.000',
            'note' => '3–5 halaman, SEO dasar',
          ),
          2 => 
          array (
            'name' => 'Custom Website',
            'price' => 'Rp 3.000.000+',
            'note' => 'Sesuai kebutuhan & fitur',
          ),
        ),
      ),
    ),
    1 => 
    array (
      'slug' => 'samp',
      'title' => 'SA-MP / Open.MP Development',
      'short' => 'Scripting Pawn, sistem roleplay, MySQL, UCP, debugging, dan optimasi.',
      'description' => 'Pengembangan server multiplayer: gamemode, fitur custom, integrasi database, sampai optimasi performa biar player nyaman.',
      'for' => 
      array (
        0 => 'Komunitas / server roleplay',
        1 => 'Butuh fitur custom Pawn',
        2 => 'Server sering lag / crash',
      ),
      'items' => 
      array (
        0 => 'Gamemode & sistem roleplay',
        1 => 'Scripting Pawn / Open.MP',
        2 => 'Integrasi MySQL & UCP',
        3 => 'Debugging & optimasi server',
      ),
      'pricing' => 
      array (
        'label' => 'Mulai dari',
        'tiers' => 
        array (
          0 => 
          array (
            'name' => 'Script Fitur',
            'price' => 'Rp 150.000',
            'note' => 'Per fitur / command custom',
          ),
          1 => 
          array (
            'name' => 'Setup Server',
            'price' => 'Rp 500.000',
            'note' => 'Install, config, MySQL, dasar',
          ),
          2 => 
          array (
            'name' => 'Full Development',
            'price' => 'Rp 2.000.000+',
            'note' => 'Gamemode / sistem besar',
          ),
        ),
      ),
    ),
    2 => 
    array (
      'slug' => 'vps',
      'title' => 'VPS & Server Administration',
      'short' => 'Setup Linux, panel, web server, keamanan dasar, backup, dan troubleshooting.',
      'description' => 'Setup infrastruktur Linux untuk web atau game server: panel, web server, security dasar, backup, sampai recovery.',
      'for' => 
      array (
        0 => 'Butuh VPS tapi bingung setup',
        1 => 'Game server / web server production',
        2 => 'Perlu panel & backup yang rapi',
      ),
      'items' => 
      array (
        0 => 'Setup VPS Linux',
        1 => 'Panel: CloudPanel / Pterodactyl',
        2 => 'Web server & security dasar',
        3 => 'Backup & recovery',
      ),
      'pricing' => 
      array (
        'label' => 'Mulai dari',
        'tiers' => 
        array (
          0 => 
          array (
            'name' => 'Setup VPS',
            'price' => 'Rp 250.000',
            'note' => 'Install OS, hardening, akses',
          ),
          1 => 
          array (
            'name' => 'Panel + Web Server',
            'price' => 'Rp 500.000',
            'note' => 'CloudPanel / Nginx / SSL',
          ),
          2 => 
          array (
            'name' => 'Admin Bulanan',
            'price' => 'Rp 750.000/bln',
            'note' => 'Monitoring, update, backup',
          ),
        ),
      ),
    ),
  ),
);
