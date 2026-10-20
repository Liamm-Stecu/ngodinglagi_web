@include('errors.error', [
    'code' => 419,
    'title' => 'Sesi berakhir',
    'message' => 'Sesi kamu sudah kedaluwarsa. Muat ulang halaman dan coba lagi.',
    'cta' => ['label' => 'Muat ulang', 'href' => url()->previous()],
    'variant' => 'error',
])
