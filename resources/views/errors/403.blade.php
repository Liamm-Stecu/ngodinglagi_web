@include('errors.error', [
    'code' => 403,
    'title' => 'Akses ditolak',
    'message' => 'Kamu tidak punya izin untuk membuka halaman ini. Kalau merasa ini salah, hubungi kami.',
    'cta' => ['label' => 'Kembali ke beranda', 'href' => route('home')],
    'variant' => 'error',
])
