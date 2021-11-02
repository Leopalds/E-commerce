<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => Str::random(10),
            'descricao' => Str::random(20),
            'preco' => rand(1, 100),
            'quantidade' => rand(1, 20)
        ];
    }
}
