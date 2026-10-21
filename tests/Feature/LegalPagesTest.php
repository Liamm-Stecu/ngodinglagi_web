<?php

namespace Tests\Feature;

use Tests\TestCase;

class LegalPagesTest extends TestCase
{
    public function test_privacy_page_renders(): void
    {
        $this->get(route('privacy'))
            ->assertOk()
            ->assertSee('Kebijakan Privasi');
    }

    public function test_terms_page_renders(): void
    {
        $this->get(route('terms'))
            ->assertOk()
            ->assertSee('Syarat');
    }

    public function test_changelog_page_renders(): void
    {
        $this->get(route('changelog'))
            ->assertOk()
            ->assertSee('Changelog');
    }

    public function test_footer_links_privacy_and_terms(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee(route('privacy'), false)
            ->assertSee(route('terms'), false)
            ->assertSee(route('changelog'), false);
    }

    public function test_floating_wa_button_present(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('floating-wa', false)
            ->assertSee('Chat WhatsApp', false);
    }
}
