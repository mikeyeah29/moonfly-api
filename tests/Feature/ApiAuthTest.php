<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class ApiAuthTest extends TestCase
{
    use RefreshDatabase;

    private function before() {
        \Artisan::call('passport:install');
        $user = new User([
            'name' => 'Bob',
            'email' => 'bob@bobby.com',
            'password' => bcrypt('abc123')
        ]);
        $user->save();
    }

    public function testLoginIncorrectCredentials()
    {
        $this->before();

        $response = $this->json('POST', '/api/auth/login', [
            'email' => 'yeah@hmm.com',
            'password' => 'hmmm',
            'remember_me' => false
        ]);

        $response->assertStatus(401);
    }

    public function testLoginSuccess()
    {
        $this->before();

        $response = $this->json('POST', '/api/auth/login', [
            'email' => 'bob@bobby.com',
            'password' => 'abc123',
            'remember_me' => false
        ]);

        $response->assertStatus(200);
    }

    public function testLoginReturnsAccessToken()
    {
        $this->before();

        $response = $this->json('POST', '/api/auth/login', [
            'email' => 'bob@bobby.com',
            'password' => 'abc123',
            'remember_me' => false
        ]);

        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_at'
        ]);
    }

    public function testGetLoggedInUser()
    {
        $this->before();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user, 'api')
            ->json('GET', '/api/auth/user');

        $response->assertStatus(200);
    }

    public function testLogout()
    {
        $this->get('/api/auth/logout');
        $response = $this->json('GET', '/api/auth/user');
        $response->assertStatus(401);
    }
}
