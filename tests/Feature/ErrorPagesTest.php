<?php

namespace Tests\Feature;

use Tests\TestCase;

class ErrorPagesTest extends TestCase
{
    public function test_404_page_shows_construction_message(): void
    {
        $this->get('/halaman-tidak-ada-ya')
            ->assertNotFound()
            ->assertSee('Halaman tidak ditemukan')
            ->assertSee('tidak ada')
            ->assertSee('Kembali ke beranda')
            ->assertDontSee('header-bar');
    }

    public function test_500_error_page_renders(): void
    {
        $html = view('errors.500')->render();

        $this->assertStringContainsString('Sedang ada gangguan', $html);
        $this->assertStringContainsString('error-ring', $html);
        $this->assertStringNotContainsString('header-bar', $html, 'error page tanpa nav');
    }

    public function test_503_maintenance_page_renders(): void
    {
        $html = view('errors.503')->render();

        $this->assertStringContainsString('Sedang dalam perawatan', $html);
        $this->assertStringContainsString('konstruksi', $html);
        $this->assertStringContainsString('build-gear', $html);
        $this->assertStringNotContainsString('hazard-stripe', $html);
        $this->assertStringNotContainsString('header-bar', $html, 'maintenance page tanpa nav');
    }

    public function test_403_419_429_pages_render(): void
    {
        foreach (['403' => 'Akses ditolak', '419' => 'Sesi berakhir', '429' => 'Terlalu banyak permintaan'] as $file => $expected) {
            $html = view('errors.'.$file)->render();
            $this->assertStringContainsString($expected, $html, "error page {$file}");
        }
    }
}
