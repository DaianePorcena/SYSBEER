<?php

namespace App\Factories;

use App\Models\Embalagem;

interface FactoryEmbalagemInterface
{
    public function criar(string $tipo): Embalagem;
}