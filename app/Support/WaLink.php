<?php

namespace App\Support;

class WaLink
{
    public static function make(string $baseUrl, string $message): string
    {
        $separator = str_contains($baseUrl, '?') ? '&' : '?';

        return $baseUrl.$separator.'text='.rawurlencode($message);
    }
}
