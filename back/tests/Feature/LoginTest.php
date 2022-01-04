<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $creds = [
            "email" => "joao@email.com",
            "password" => "123456"
        ];
        $response = $this->post('/api/login', $creds);

        $response->assertStatus(200);
    }
}
