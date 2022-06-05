<?php

namespace Tests\Unit;

use App\Models\Category;
use Tests\TestCase;
use App\Models\Post;
use App\User;
use Laravel\Passport\Passport;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreatePost(){
        Passport::actingAs(
            factory(User::class)->create(),
        );

        $category = factory(Category::class)->create();
        
        $data = [
            'category_id' => $category->id,
            'title' => "Tes Title",
            'desc' => "Tes Description",
            'content' => "Tes Content",
            'author' => "admin",
        ];

        $this->json('POST', 'api/v1/post', $data)->assertStatus(201);
    }

    public function testListPosts(){
        Passport::actingAs(
            factory(User::class)->create(),
        );

        $category = factory(Category::class)->create();

        factory(Post::class)->create([
            'category_id' => $category->id,
            'title' => "Tes Title",
            'desc' => "Tes Description",
            'content' => "Tes Content",
            'author' => "admin",
        ]);

        $this->json('GET', 'api/v1/post')->assertStatus(200);
    }

    public function testShowPost(){
        Passport::actingAs(
            factory(User::class)->create(),
        );

        $category = factory(Category::class)->create();

        $posts = factory(Post::class)->create([
            'category_id' => $category->id,
            'title' => "Tes Title",
            'desc' => "Tes Description",
            'content' => "Tes Content",
            'author' => "admin",
        ]);

        $this->json('GET', "api/v1/post/$posts->id")->assertStatus(200);
    }

    public function testUpdatePost(){
        Passport::actingAs(
            factory(User::class)->create(),
        );

        $category = factory(Category::class)->create();

        $posts = factory(Post::class)->create([
            'category_id' => $category->id,
            'title' => "Tes Title",
            'desc' => "Tes Description",
            'content' => "Tes Content",
            'author' => "admin",
        ]);

        $data = [
            'category_id' => $category->id,
            'title' => "Tes Update Title",
            'desc' => "Tes Update Description",
            'content' => "Tes Update Content",
            'author' => "admin",
        ];

        $this->json('PUT', "api/v1/post/$posts->id", $data)->assertStatus(200);
    }

    public function testDeletePost(){
        Passport::actingAs(
            factory(User::class)->create(),
        );

        $category = factory(Category::class)->create();

        $posts = factory(Post::class)->create([
            'category_id' => $category->id,
            'title' => "Tes Title",
            'desc' => "Tes Description",
            'content' => "Tes Content",
            'author' => "admin",
        ]);

        $this->json('DELETE', "api/v1/post/$posts->id")->assertStatus(200);
    }
    
}
