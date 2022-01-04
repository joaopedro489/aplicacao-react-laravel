<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = [
            "cep" => "20766721",
            "complement" => "Bl.10 Apt.408",
            "cpf" => "14400408779",
            "email" => "joaopedro" . rand(0, 1000000). "@gmail.com",
            "municipality" => "Rio de Janeiro",
            "name" => "João Pedro Cavalcante Mateus da Silva",
            "number" => "4800",
            "password" => "123456",
            "pis" => "12345678901",
            "state_id" => "16",
            "street" => "Estrada Adhemar Bebiano"
        ];
        $response = $this->post('/api/user', $data);

        $response->assertStatus(200);
    }
}
