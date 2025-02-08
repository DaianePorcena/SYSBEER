<?php

namespace Database\Seeders;

use App\Models\Embalagem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmbalagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $embalagens = [
            ['id' => 1, 'tipo' => 'Lata 250ml'],
            ['id' => 2, 'tipo' => 'Lata 350ml'],
            ['id' => 3, 'tipo' => 'Lata 473ml'],
            ['id' => 4, 'tipo' => 'Garrafa 250ml'],
            ['id' => 5, 'tipo' => 'Garrafa 600ml'],
            ['id' => 6, 'tipo' => 'Garrafa 1L'],
            ['id' => 7, 'tipo' => 'Pet 250ml'],
            ['id' => 8, 'tipo' => 'Pet 600ml'],
            ['id' => 9, 'tipo' => 'Pet 1L'],
            ['id' => 10, 'tipo' => 'Pet 2L'],
            ['id' => 11, 'tipo' => 'Caixa 200ml'],
            ['id' => 12, 'tipo' => 'Caixa 1L'],
        ];

        foreach ($embalagens as $tipo){
            Embalagem::create(['id' => $tipo['id'], 'tipo' => $tipo['tipo']]);
        }
    }
}
