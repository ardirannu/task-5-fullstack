<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateArticle()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();
    
        $response = $this->actingAs($user)
        ->post(route('article.store'), [
            'title' => 'Task 5 Fullstack',
            'content' => 'Task content',
            'image' => 'Task image.png',
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $response->assertStatus(302);
    }

    public function testReadArticle()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();
    
        $postArticle = $this->actingAs($user)
        ->post(route('article.store'), [
            'title' => 'Task 5 Fullstack',
            'content' => 'Task content',
            'image' => 'Task image.png',
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $readArticle = $this->actingAs($user)->get(route('article.index'));
        $readArticle->assertStatus(200);
    }

    public function testUpdateArticle()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();
        $article = factory(Article::class)->create();

        $updateArticle = $this->actingAs($user)
        ->put(route('article.update', $article->id), [
            'title' => 'Task 5 Fullstack Update',
            'content' => 'Task content Update',
            'image' => 'Task image Update.png',
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $updateArticle->assertStatus(302);
    }

    public function testDeleteArticle()
    {
        $user = factory(User::class)->create();
        $article = factory(Article::class)->create();

        $deleteArticle = $this->actingAs($user)
        ->delete(route('article.destroy', $article->id));

        $deleteArticle->assertStatus(302);
    }
}
