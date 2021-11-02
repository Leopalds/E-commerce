<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::factory()->count(20)->create();
    }
}
