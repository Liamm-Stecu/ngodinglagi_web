@include('errors.error', [
    'code' => 503,
    'title' => 'Sedang dalam perawatan',
    'message' => 'Lagi ada konstruksi di balik layar. Selesai sebentar lagi — terima kasih udah nunggu.',
    'cta' => ['label' => 'Coba lagi', 'href' => url()->current()],
    'variant' => 'maintenance',
])
