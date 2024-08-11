<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_the_login_page_load_successfull(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_the_user_login_with_email_and_password(): void
    {
        // custom user login authenticatino system
        $response = $this->userAuthSet();
        // if redirect or not
        $response->assertRedirect(route('get.products'));

    }
}
