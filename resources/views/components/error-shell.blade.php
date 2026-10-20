<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @php
            $pageTitle = ($title ?? 'Error').' — ngodinglagi';
            $pageDescription = $description ?? 'Jasa web development, SA-MP/Open.MP, dan VPS/server administration.';
        @endphp

        <title>{{ $pageTitle }}</title>
        <meta name="description" content="{{ $pageDescription }}">
        <meta name="robots" content="noindex, nofollow">

        <script>
            (function () {
                try {
                    var t = localStorage.getItem('theme');
                    if (t === 'dark' || (!t && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                        document.documentElement.classList.add('dark');
                    }
                } catch (e) {}
            })();
        </script>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <noscript>
            <style>
                [data-reveal] {
                    opacity: 1 !important;
                    transform: none !important;
                }
            </style>
        </noscript>
    </head>

    <body class="flex min-h-screen flex-col items-center justify-center bg-background font-sans text-foreground antialiased">
        {{ $slot }}
    </body>
</html>
