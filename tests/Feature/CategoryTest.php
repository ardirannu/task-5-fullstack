<?php

namespace Tests\Feature;

use App\Models\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateCategory()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
        ->post(route('category.store'), [
            'name' => 'Comedy',
            'user_id' => $user->id,
        ]);

        $response->assertStatus(302);
    }

    public function testReadCategory()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
        ->post(route('category.store'), [
            'name' => 'Comedy',
            'user_id' => $user->id,
        ]);

        $readCategory = $this->actingAs($user)->get(route('category.index'));
        $readCategory->assertStatus(200);
    }

    public function testUpdateArticle()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $updateCategory = $this->actingAs($user)
        ->put(route('category.update', $category->id), [
            'name' => 'News',
            'user_id' => $user->id,
        ]);

        $updateCategory->assertStatus(302);
    }

    public function testDeleteArticle()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $deleteCategory = $this->actingAs($user)
        ->delete(route('category.destroy', $category->id));

        $deleteCategory->assertStatus(302);
    }
}
