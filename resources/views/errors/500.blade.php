@include('errors.error', [
    'code' => 500,
    'title' => 'Sedang ada gangguan',
    'message' => 'Server lagi benerin sesuatu. Coba beberapa saat lagi, atau hubungi kami kalau perlu bantuan.',
    'cta' => ['label' => 'Hubungi kami', 'href' => route('kontak')],
    'variant' => 'error',
])
