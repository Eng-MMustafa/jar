<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentsTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_post_comment()
    {
        $product = Product::factory()->create();

        $response = $this->postJson(route('products.comments.store', $product), ['body' => 'Nice']);
        $response->assertStatus(401);
    }

    public function test_authenticated_user_can_post_comment()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $response = $this->actingAs($user)->postJson(route('products.comments.store', $product), ['body' => 'Great product']);
        $response->assertStatus(200)->assertJsonStructure(['success','html']);
        $this->assertDatabaseHas('comments', ['user_id' => $user->id, 'product_id' => $product->id, 'body' => 'Great product']);
    }

    public function test_user_can_only_rate_once()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $response = $this->actingAs($user)->postJson(route('products.comments.store', $product), ['body' => 'Nice', 'rating' => 5]);
        $response->assertStatus(200)->assertJson(['success' => true]);
        $this->assertDatabaseHas('comments', ['user_id' => $user->id, 'product_id' => $product->id, 'rating' => 5]);

        // Attempt to rate again
        $response = $this->actingAs($user)->postJson(route('products.comments.store', $product), ['body' => 'Another', 'rating' => 4]);
        $response->assertStatus(422);
    }
}
