@props([
    'size' => 'md',
    'standalone' => false,
])

@php
    $sizes = [
        'sm' => 'size-7 rounded-md text-[13px]',
        'md' => 'size-9 rounded-xl text-base',
        'lg' => 'size-12 rounded-2xl text-xl',
    ];

    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

@if ($standalone)
    <span {{ $attributes->merge(['class' => "inline-flex $sizeClass shrink-0 items-center justify-center bg-primary font-heading font-bold tracking-tight text-on-primary shadow-sm"]) }} aria-hidden="true">
        @include('components.brand-mark')
    </span>
@else
    <span class="flex min-w-0 items-center gap-2.5">
        <span {{ $attributes->merge(['class' => "inline-flex $sizeClass shrink-0 items-center justify-center bg-primary font-heading font-bold tracking-tight text-on-primary shadow-sm"]) }} aria-hidden="true">
            @include('components.brand-mark')
        </span>
        {{ $slot }}
    </span>
@endif
