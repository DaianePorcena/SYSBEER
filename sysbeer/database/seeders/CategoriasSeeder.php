<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categorias = [
            ['id' => 1, 'nome' => 'Cerveja'],
            ['id' => 2, 'nome' => 'Refrigerante'],
            ['id' => 3, 'nome' => 'Destilados'],
            ['id' => 4, 'nome' => 'Sucos'],
        ];
        foreach ($categorias as $categoria){
            Categorias::create(['id' => $categoria['id'], 'nome' => $categoria['nome']]);
        }
    }
}
