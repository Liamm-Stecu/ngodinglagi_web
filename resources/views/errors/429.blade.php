@include('errors.error', [
    'code' => 429,
    'title' => 'Terlalu banyak permintaan',
    'message' => 'Permintaan kamu terlalu sering. Tunggu sebentar lalu coba lagi ya.',
    'cta' => ['label' => 'Kembali ke beranda', 'href' => route('home')],
    'variant' => 'error',
])
