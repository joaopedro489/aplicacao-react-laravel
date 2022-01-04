<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Address;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"=> "João Pedro",
            "email" => "joao@email.com",
            "password" => bcrypt("123456"),
            "cpf" => "14400408779"
        ]);
        Address::create([
            "user_id" => 1,
            "state_id" => 16,
            "municipality" => "Rio de Janeiro",
            "cep" => "20766721",
            "street" => "Estrada Adhemar Bebiano",
            "number" => "4800"
        ]);
    }
}
