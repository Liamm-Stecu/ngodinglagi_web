<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_renders_with_form(): void
    {
        $response = $this->get(route('kontak'));

        $response->assertOk();
        $response->assertSee('name="name"', false);
        $response->assertSee('name="message"', false);
        $response->assertSee(route('kontak.store'), false);
    }

    public function test_contact_form_stores_message(): void
    {
        $response = $this->post(route('kontak.store'), [
            'name' => 'Budi',
            'email' => 'budi@example.com',
            'message' => 'Saya butuh website untuk toko saya.',
        ]);

        $response->assertRedirect(route('kontak'));
        $response->assertSessionHas('contact_success');

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Budi',
            'email' => 'budi@example.com',
        ]);
    }

    public function test_contact_form_requires_name_and_message(): void
    {
        $response = $this->from(route('kontak'))->post(route('kontak.store'), [
            'name' => '',
            'message' => '',
        ]);

        $response->assertRedirect(route('kontak'));
        $response->assertSessionHasErrors(['name', 'message']);
        $this->assertDatabaseCount('contact_messages', 0);
    }

    public function test_contact_form_rejects_short_message(): void
    {
        $response = $this->from(route('kontak'))->post(route('kontak.store'), [
            'name' => 'Budi',
            'message' => 'pendek',
        ]);

        $response->assertSessionHasErrors('message');
        $this->assertDatabaseCount('contact_messages', 0);
    }

    public function test_admin_can_list_and_delete_messages(): void
    {
        $message = ContactMessage::factory()->create();

        $this->withSession(['admin_auth' => true])
            ->get(route('admin.messages.index'))
            ->assertOk()
            ->assertSee($message->name);

        $this->withSession(['admin_auth' => true])
            ->post(route('admin.messages.destroy', $message->id))
            ->assertRedirect();

        $this->assertDatabaseCount('contact_messages', 0);
    }
}
