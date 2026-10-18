<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_loads(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('ngodinglagi')
            ->assertSee('NgodingLagi?')
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

    public function test_portofolio_page_loads_with_stats(): void
    {
        $this->get(route('portofolio'))
            ->assertOk()
            ->assertSee('Portofolio')
            ->assertSee((string) config('portfolio.stats.samp'))
            ->assertSee((string) config('portfolio.stats.web'));
    }

    public function test_kontak_page_loads_with_channels(): void
    {
        $this->get(route('kontak'))
            ->assertOk()
            ->assertSee('Ngobrol dulu aja')
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
            ->assertSee('Apa yang bisa')
            ->assertSee('Web Development & Deployment')
            ->assertSee('SA-MP / Open.MP Development')
            ->assertSee('VPS & Server Administration');
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
}
