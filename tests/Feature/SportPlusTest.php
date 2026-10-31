<?php

namespace Tests\Feature;

use App\Events\CallbackRequested;
use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class SportPlusTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(ProductSeeder::class);
    }

    public function test_homepage_loads_products_and_yandex_map(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('СПОРТ');
        $response->assertSee('ПЛЮС');
        $response->assertSee('Jögel');
        $response->assertSee('api-maps.yandex.ru');
    }

    public function test_callback_form_validation_fails_on_empty_fields(): void
    {
        $response = $this->post('/callback', [
            'name' => '',
            'phone' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'phone']);
    }

    public function test_callback_form_creates_model_dispatches_event_and_sets_session(): void
    {
        Event::fake([CallbackRequested::class]);

        $response = $this->post('/callback', [
            'name' => 'Мария',
            'phone' => '+79997778899',
            'comment' => 'Консультация',
        ]);

        $response->assertSessionHas('success');
        $response->assertRedirect();

        $this->assertDatabaseHas('callback_requests', [
            'name' => 'Мария',
            'phone' => '+79997778899',
        ]);

        Event::assertDispatched(CallbackRequested::class);
    }

    public function test_cart_session_stores_items_and_updates_count(): void
    {
        $product = Product::first();

        $response = $this->post('/cart/add', [
            'product_id' => $product->id,
        ]);

        $response->assertSessionHas('cart');
        $response->assertSessionHas('cart_success');

        $cart = session('cart');
        $this->assertArrayHasKey($product->id, $cart);
        $this->assertEquals(1, $cart[$product->id]['quantity']);
    }
}
