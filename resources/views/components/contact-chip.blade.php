@props([
    'href' => null,
    'label',
    'display',
    'variant' => 'light',
    'copyable' => false,
])

@php
    $surface = $variant === 'dark'
        ? 'border-white/15 bg-white/10 hover:bg-white/15'
        : 'border-border bg-card hover:border-primary/35 hover:bg-muted';
    $muted = $variant === 'dark' ? 'text-on-primary/70' : 'text-muted-foreground';
    $value = $variant === 'dark' ? 'text-on-primary' : 'text-foreground';
    $root = 'inline-flex min-h-11 w-full items-center gap-2.5 rounded-xl border px-3.5 py-2.5 text-left transition-all duration-200 '.$surface;
@endphp

@if ($copyable)
    <button
        type="button"
        data-copy="{{ $display }}"
        {{ $attributes->merge(['class' => $root])->class(['group/clip cursor-pointer']) }}
    >
@else
    <a
        href="{{ $href }}"
        target="_blank"
        rel="noopener noreferrer"
        {{ $attributes->merge(['class' => $root])->class(['group/clip']) }}
    >
@endif
        <span class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary" aria-hidden="true">
            {{ $slot }}
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-[11px] font-semibold uppercase tracking-wider {{ $muted }}">
                {{ $label }}
            </span>
            <span class="block truncate text-sm font-medium {{ $value }}">
                {{ $display }}
            </span>
        </span>
        @if ($copyable)
            <span
                data-copy-label
                class="text-[11px] font-medium {{ $muted }} opacity-0 transition-opacity duration-200 group-hover/clip:opacity-100 group-focus-visible/clip:opacity-100"
            >
                salin
            </span>
        @endif
@if ($copyable)
    </button>
@else
    </a>
@endif
