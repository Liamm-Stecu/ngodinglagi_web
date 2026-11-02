<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') · LagiNgoding</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|space-grotesk:500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('admin.partials.styles')
</head>
<body class="antialiased">
    <div class="admin-modal-page" data-modal-backdrop data-dashboard-url="{{ route('admin.dashboard') }}">
        <div class="admin-modal @yield('modal-size', '')" role="dialog" aria-modal="true" aria-labelledby="admin-modal-title">
            <header class="admin-modal-head">
                <div class="flex min-w-0 items-start gap-3.5">
                    <span class="admin-icon-chip size-10 shrink-0" aria-hidden="true">
                        @hasSection('modal-icon')
                            @yield('modal-icon')
                        @else
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                        @endif
                    </span>
                    <div class="min-w-0">
                        <p class="admin-eyebrow">@yield('modal-eyebrow', 'Edit konten')</p>
                        <h1 id="admin-modal-title" class="admin-modal-title">@yield('modal-title', 'Edit')</h1>
                        <p class="admin-modal-sub">@yield('modal-subtitle', '')</p>
                    </div>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="admin-modal-close" aria-label="Tutup edit" title="Tutup (Esc)">
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </a>
            </header>

            <div class="admin-modal-body">
                @if (session('status'))
                    <div class="admin-flash mb-4">{{ session('status') }}</div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                @yield('content')
            </div>

            @hasSection('modal-actions')
                <footer class="admin-modal-foot">
                    @yield('modal-actions')
                </footer>
            @endif
        </div>
    </div>

    <script>
        (function () {
            var backdrop = document.querySelector('[data-modal-backdrop]');
            var dashboardUrl = backdrop ? backdrop.getAttribute('data-dashboard-url') : null;

            function goBack() {
                if (dashboardUrl) {
                    window.location.href = dashboardUrl;
                }
            }

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    goBack();
                }
            });

            if (backdrop) {
                backdrop.addEventListener('click', function (event) {
                    if (event.target === backdrop) {
                        goBack();
                    }
                });
            }
        })();
    </script>
</body>
</html>
