<?php

namespace App\Factories;

use App\Models\Embalagem;

class EmbalagemFactory implements FactoryEmbalagemInterface{
    public function criar(string $tipo): Embalagem
    {
        return Embalagem::create([
            'tipo' => $tipo,
        ]);
    }
}