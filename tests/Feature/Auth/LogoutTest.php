<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanLogout()
    {
        $user = factory(User::class)->create([
            'email'    => 'username@example.net',
            'password' => bcrypt($password = 'secret'),
        ]);

        $this->actingAs($user);
        $this->post('logout');
    }
}
