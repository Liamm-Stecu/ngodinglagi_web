<?php

namespace Tests\Feature;

use App\Support\ConfigWriter;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    private function actingAsAdmin(): static
    {
        $this->withSession(['admin_auth' => true]);

        return $this;
    }

    public function test_admin_requires_password(): void
    {
        $this->get(route('admin.login'))
            ->assertOk()
            ->assertSee('Password', false);

        $this->post(route('admin.login'), ['password' => 'wrong-password'])
            ->assertSessionHasErrors('password')
            ->assertRedirect(route('admin.login'));
    }

    public function test_admin_login_redirects_to_dashboard(): void
    {
        $this->post(route('admin.login'), ['password' => config('admin.password')])
            ->assertRedirect(route('admin.dashboard'));
    }

    public function test_admin_pages_require_auth(): void
    {
        foreach ([
            'admin.dashboard',
            'admin.contact.edit',
            'admin.services.edit',
            'admin.portfolio.edit',
            'admin.partner.edit',
        ] as $route) {
            $this->get(route($route))->assertRedirect(route('admin.login'));
        }
    }

    public function test_admin_dashboard_loads_when_authenticated(): void
    {
        $this->actingAsAdmin()
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Dashboard')
            ->assertSee('Kontak')
            ->assertSee('Layanan')
            ->assertSee('Portofolio')
            ->assertSee('Mitra');
    }

    public function test_admin_contact_update_persists_config(): void
    {
        $original = ConfigWriter::read('contact');

        try {
            $this->actingAsAdmin()->post(route('admin.contact.update'), [
                'whatsapp' => [
                    'label' => 'WhatsApp',
                    'display' => '0812-2101-5825',
                    'url' => 'https://wa.me/6281221015825',
                ],
                'instagram' => [
                    'label' => 'Instagram',
                    'display' => '@marcelanwl',
                    'url' => 'https://www.instagram.com/marcelanwl',
                ],
                'discord' => [
                    'label' => 'Discord',
                    'display' => 'lumikylinnn_28271',
                ],
            ])->assertRedirect(route('admin.contact.edit'));

            $this->assertSame('@marcelanwl', ConfigWriter::read('contact')['instagram']['display']);
        } finally {
            ConfigWriter::write('contact', $original);
        }
    }

    public function test_admin_partner_update_persists_config(): void
    {
        $original = ConfigWriter::read('products');

        try {
            $this->actingAsAdmin()->post(route('admin.partner.update'), [
                'affiliate_url' => 'https://widehostmedia.com/manage/aff.php?aff=102',
                'partner' => 'Wide Host Media',
            ])->assertRedirect(route('admin.partner.edit'));

            $this->assertSame('Wide Host Media', ConfigWriter::read('products')['partner']);
        } finally {
            ConfigWriter::write('products', $original);
        }
    }

    public function test_admin_can_edit_layanan_and_portofolio(): void
    {
        $this->actingAsAdmin()
            ->get(route('admin.services.edit'))
            ->assertOk()
            ->assertSee('Landing Page')
            ->assertSee('Rp 750.000');

        $this->actingAsAdmin()
            ->get(route('admin.portfolio.edit'))
            ->assertOk()
            ->assertSee('Proyek SA-MP')
            ->assertSee('23');

        $this->actingAsAdmin()
            ->get(route('admin.partner.edit'))
            ->assertOk()
            ->assertSee('affiliate_url');
    }
}
