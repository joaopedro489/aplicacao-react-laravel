<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::insert([
            [
                "name" => "Acre",
                "country_id" => 1
            ],
            [
                "name" => "Rondônia",
                "country_id" => 1
            ],
            [
                "name" => "Roraima",
                "country_id" => 1
            ],
            [
                "name" => "Amazonas",
                "country_id" => 1
            ],
            [
                "name" => "Pará",
                "country_id" => 1
            ],
            [
                "name" => "Amapá",
                "country_id" => 1
            ],
            [
                "name" => "Tocantins",
                "country_id" => 1
            ],
            [
                "name" => "Mato Grosso",
                "country_id" => 1
            ],
            [
                "name" => "Mato Grosso do Sul",
                "country_id" => 1
            ],
            [
                "name" => "Goiás",
                "country_id" => 1
            ],
            [
                "name" => "Distrito Federal",
                "country_id" => 1
            ],
            [
                "name" => "Paraná",
                "country_id" => 1
            ],
            [
                "name" => "Santa Catarina",
                "country_id" => 1
            ],
            [
                "name" => "Rio Grande do Sul",
                "country_id" => 1
            ],
            [
                "name" => "São Paulo",
                "country_id" => 1
            ],
            [
                "name" => "Rio de Janeiro",
                "country_id" => 1
            ],
            [
                "name" => "Minas Gerais",
                "country_id" => 1
            ],
            [
                "name" => "Espirito Santo",
                "country_id" => 1
            ],
            [
                "name" => "Bahia",
                "country_id" => 1
            ],
            [
                "name" => "Sergipe",
                "country_id" => 1
            ],
            [
                "name" => "Alagoas",
                "country_id" => 1
            ],
            [
                "name" => "Pernambuco",
                "country_id" => 1
            ],
            [
                "name" => "Paraíba",
                "country_id" => 1
            ],
            [
                "name" => "Rio Grande do Norte",
                "country_id" => 1
            ],
            [
                "name" => "Ceará",
                "country_id" => 1
            ],
            [
                "name" => "Píaui",
                "country_id" => 1
            ],
            [
                "name" => "Maranhão",
                "country_id" => 1
            ]
        ]);
    }
}
