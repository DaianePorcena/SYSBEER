<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ProdutoFacade extends Facade{
    protected static function getFacadeAccessor(){
        return 'produtoService';
    }
}