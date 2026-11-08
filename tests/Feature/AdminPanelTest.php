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

    public function test_admin_login_is_rate_limited(): void
    {
        foreach (range(1, 5) as $attempt) {
            $this->post(route('admin.login'), ['password' => 'wrong-password-'.$attempt])
                ->assertSessionHasErrors('password');
        }

        $this->post(route('admin.login'), ['password' => 'wrong-password'])
            ->assertStatus(429);
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
            'admin.services.create',
            'admin.portfolio.edit',
            'admin.partner.edit',
        ] as $route) {
            $this->get(route($route))->assertRedirect(route('admin.login'));
        }

        $this->get(route('admin.services.edit_one', 0))->assertRedirect(route('admin.login'));
    }

    public function test_admin_dashboard_loads_when_authenticated(): void
    {
        $this->actingAsAdmin()
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Dashboard')
            ->assertSee('Kontak')
            ->assertSee('Layanan')
            ->assertSee('Tentang')
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

    public function test_modal_icon_renders_as_svg_not_escaped_text(): void
    {
        foreach ([
            'admin.contact.edit',
            'admin.services.edit',
            'admin.services.create',
            'admin.portfolio.edit',
            'admin.partner.edit',
        ] as $route) {
            $this->actingAsAdmin()
                ->get(route($route))
                ->assertOk()
                ->assertSee('<svg class="size-5"', false)
                ->assertDontSee('&lt;svg', false);
        }

        $this->actingAsAdmin()
            ->get(route('admin.services.edit_one', 0))
            ->assertOk()
            ->assertSee('<svg class="size-5"', false)
            ->assertDontSee('&lt;svg', false);
    }

    public function test_admin_services_list_shows_per_service_edit_button(): void
    {
        $this->actingAsAdmin()
            ->get(route('admin.services.edit'))
            ->assertOk()
            ->assertSee(route('admin.services.create'), false)
            ->assertSee(route('admin.services.edit_one', 0), false)
            ->assertDontSee('name="services[0][title]"', false);
    }

    public function test_admin_can_update_single_service(): void
    {
        $original = ConfigWriter::read('services');
        $service = $original['services'][0];

        try {
            $this->actingAsAdmin()->post(route('admin.services.update', 0), [
                'slug' => $service['slug'],
                'title' => 'Judul Uji Edit',
                'short' => $service['short'],
                'description' => $service['description'],
                'items_text' => implode("\n", $service['items']),
                'for_text' => implode("\n", $service['for']),
                'pricing' => [
                    'label' => $service['pricing']['label'],
                    'tiers' => $service['pricing']['tiers'],
                ],
            ])->assertRedirect(route('admin.services.edit'));

            $updated = ConfigWriter::read('services')['services'][0];

            $this->assertSame('Judul Uji Edit', $updated['title']);
            $this->assertSame($service['slug'], $updated['slug']);
            $this->assertSame($service['items'], $updated['items']);
            $this->assertSame($service['pricing']['tiers'], $updated['pricing']['tiers']);
        } finally {
            ConfigWriter::write('services', $original);
        }
    }

    public function test_admin_can_add_and_remove_service(): void
    {
        $original = ConfigWriter::read('services');
        $before = count($original['services'] ?? []);

        try {
            $this->actingAsAdmin()->post(route('admin.services.store'), [
                'title' => 'Layanan Uji',
                'short' => 'Singkat layanan uji.',
                'description' => 'Deskripsi layanan uji.',
                'items_text' => "Cakupan satu\nCakupan dua",
                'for_text' => 'Kebutuhan uji',
                'pricing' => [
                    'label' => 'Mulai dari',
                    'tiers' => [
                        ['name' => 'Paket Uji', 'price' => 'Rp 1', 'note' => ''],
                    ],
                ],
            ])->assertRedirect(route('admin.services.edit'));

            $this->assertCount($before + 1, ConfigWriter::read('services')['services']);

            $this->actingAsAdmin()->post(route('admin.services.destroy', $before))
                ->assertRedirect(route('admin.services.edit'));

            $this->assertCount($before, ConfigWriter::read('services')['services']);
        } finally {
            ConfigWriter::write('services', $original);
        }
    }

    public function test_admin_can_add_and_remove_tier(): void
    {
        $original = ConfigWriter::read('services');
        $before = count($original['services'][0]['pricing']['tiers']);

        try {
            $this->actingAsAdmin()->post(route('admin.services.tier.store', 0))
                ->assertRedirect(route('admin.services.edit'));

            $this->assertCount(
                $before + 1,
                ConfigWriter::read('services')['services'][0]['pricing']['tiers']
            );

            $this->actingAsAdmin()->post(route('admin.services.tier.destroy', [0, $before]))
                ->assertRedirect(route('admin.services.edit'));

            $this->assertCount(
                $before,
                ConfigWriter::read('services')['services'][0]['pricing']['tiers']
            );
        } finally {
            ConfigWriter::write('services', $original);
        }
    }

    public function test_admin_cannot_remove_last_service(): void
    {
        $original = ConfigWriter::read('services');
        $lastIndex = count($original['services']) - 1;

        try {
            while (count(ConfigWriter::read('services')['services'] ?? []) > 1) {
                $count = count(ConfigWriter::read('services')['services']);
                $this->actingAsAdmin()->post(route('admin.services.destroy', $count - 1));
            }

            $this->actingAsAdmin()->post(route('admin.services.destroy', 0))
                ->assertSessionHas('status');

            $this->assertCount(1, ConfigWriter::read('services')['services']);
        } finally {
            ConfigWriter::write('services', $original);
        }
    }

    public function test_admin_can_add_and_remove_portfolio_category(): void
    {
        $original = ConfigWriter::read('portfolio');
        $before = count($original['categories'] ?? []);

        try {
            $this->actingAsAdmin()->post(route('admin.portfolio.category.store'))
                ->assertRedirect(route('admin.portfolio.edit'));

            $this->assertCount($before + 1, ConfigWriter::read('portfolio')['categories']);

            $this->actingAsAdmin()->post(route('admin.portfolio.category.destroy', $before))
                ->assertRedirect(route('admin.portfolio.edit'));

            $this->assertCount($before, ConfigWriter::read('portfolio')['categories']);
        } finally {
            ConfigWriter::write('portfolio', $original);
        }
    }
}
