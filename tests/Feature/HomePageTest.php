<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_loads(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('LagiNgoding')
            ->assertSee('LagiNgoding?')
            ->assertSee('Start building')
            ->assertSee('Video & Photo Editing')
            ->assertSee('23')
            ->assertSee('8');
    }

    public function test_home_page_links_real_contact_channels(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee(config('contact.whatsapp.url'), false)
            ->assertSee(config('contact.instagram.url'), false)
            ->assertSee(config('contact.discord.display'), false);
    }

    public function test_about_page_loads_with_stats(): void
    {
        $this->get(route('about'))
            ->assertOk()
            ->assertSee('Meet LagiNgoding')
            ->assertSee((string) config('portfolio.stats.samp'))
            ->assertSee((string) config('portfolio.stats.web'))
            ->assertSee((string) config('portfolio.stats.editing'));
    }

    public function test_old_portofolio_redirects_to_about(): void
    {
        $this->get('/portofolio')
            ->assertRedirect(route('about'));
    }

    public function test_kontak_page_loads_with_channels(): void
    {
        $this->get(route('kontak'))
            ->assertOk()
            ->assertSee("Got a Project? Let's Talk", false)
            ->assertSee(config('contact.whatsapp.display'), false)
            ->assertSee(config('contact.instagram.display'), false)
            ->assertSee(config('contact.discord.display'), false)
            ->assertSee(config('contact.whatsapp.url'), false);
    }

    public function test_home_nav_kontak_points_to_kontak_page(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee(route('kontak'), false)
            ->assertDontSee('href="'.route('home', ['#kontak']).'"', false);
    }

    public function test_mobile_nav_has_hamburger_menu(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('data-nav-toggle', false)
            ->assertSee('data-nav-panel', false)
            ->assertSee('aria-controls="mobile-nav"', false)
            ->assertSee('id="mobile-nav"', false);
    }

    public function test_home_promotes_wide_host_media_affiliate(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Wide Host Media')
            ->assertSee(config('products.affiliate_url'), false);
    }

    public function test_layanan_page_loads_with_services(): void
    {
        $this->get(route('layanan'))
            ->assertOk()
            ->assertSee('What We Can')
            ->assertSee('Do for You')
            ->assertSee('Web Development & Deployment')
            ->assertSee('SA-MP / Open.MP Development')
            ->assertSee('VPS & Server Administration')
            ->assertSee('Video & Photo Editing')
            ->assertSee('<path d="M7 3v18" />', false);
    }

    public function test_layanan_page_shows_pricing(): void
    {
        $this->get(route('layanan'))
            ->assertOk()
            ->assertSee('Mulai dari')
            ->assertSee('Landing Page')
            ->assertSee('Rp 750.000')
            ->assertSee('Script Fitur')
            ->assertSee('Rp 150.000')
            ->assertSee('Setup VPS')
            ->assertSee('Rp 250.000');
    }

    public function test_layanan_page_has_contextual_whatsapp_cta(): void
    {
        $response = $this->get(route('layanan'))->assertOk();

        $this->assertStringContainsString(
            'text='.rawurlencode('Halo LagiNgoding, saya ingin tanya layanan Web Development & Deployment.'),
            $response->getContent()
        );
    }

    public function test_sitemap_and_robots_are_available(): void
    {
        $this->get(route('sitemap'))
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml')
            ->assertSee(route('home'), false)
            ->assertSee(route('layanan'), false);

        $this->get(route('robots'))
            ->assertOk()
            ->assertSee('User-agent: *', false)
            ->assertSee('Disallow: /admin', false)
            ->assertSee(route('sitemap'), false);
    }

    public function test_layout_includes_seo_and_structured_data(): void
    {
        $response = $this->get(route('home'))->assertOk();

        $this->assertStringContainsString('og:title', $response->getContent());
        $this->assertStringContainsString('twitter:card', $response->getContent());
        $this->assertStringContainsString('ProfessionalService', $response->getContent());
        $this->assertStringContainsString('application/ld+json', $response->getContent());
        $this->assertStringContainsString('"@context":"https://schema.org"', $response->getContent());
        $this->assertStringNotContainsString('$__contextArgs', $response->getContent());
    }
}
