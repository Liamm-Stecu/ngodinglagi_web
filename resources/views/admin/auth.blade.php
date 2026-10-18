<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') · ngodinglagi</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|space-grotesk:500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .admin-shell { min-height: 100vh; background: #f8fafc; color: #0f172a; }
        .admin-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 1rem; padding: 1.35rem; box-shadow: 0 1px 2px rgba(15,23,42,.03); }
        .admin-label { display: block; font-size: .72rem; font-weight: 600; text-transform: uppercase; letter-spacing: .07em; color: #64748b; margin-bottom: .35rem; }
        .admin-input { width: 100%; border: 1px solid #e2e8f0; border-radius: .75rem; background: #f8fafc; padding: .65rem .85rem; font-size: .9rem; color: #0f172a; transition: border-color .15s ease, box-shadow .15s ease, background .15s ease; }
        .admin-input:focus { outline: none; border-color: #0f766e; background: #fff; box-shadow: 0 0 0 3px rgba(15,118,110,.15); }
        .admin-btn { display: inline-flex; align-items: center; justify-content: center; gap: .4rem; background: #0f766e; color: #fff; font-weight: 600; font-size: .875rem; border-radius: .85rem; padding: .65rem 1.1rem; transition: background .15s ease, transform .15s ease, box-shadow .15s ease; }
        .admin-btn:hover { background: #0d9488; transform: translateY(-1px); box-shadow: 0 8px 18px rgba(15,118,110,.25); }
        .admin-error { color: #b91c1c; font-size: .8rem; background: #fef2f2; border: 1px solid #fecaca; border-radius: .7rem; padding: .65rem .85rem; }
        @keyframes fade-up { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes rise-in { from { opacity: 0; transform: translateY(18px) scale(.985); } to { opacity: 1; transform: translateY(0) scale(1); } }
        .animate-fade-up { animation: fade-up .45s cubic-bezier(.22,1,.36,1) both; }
        .animate-rise-in { animation: rise-in .55s cubic-bezier(.22,1,.36,1) both; }
        @media (prefers-reduced-motion: reduce) {
            .admin-btn, .admin-input, .animate-fade-up, .animate-rise-in { transition: none !important; animation: none !important; transform: none !important; }
        }
    </style>
</head>
<body class="admin-shell font-body antialiased">
    @yield('content')
</body>
</html>
