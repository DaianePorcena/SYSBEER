<?php

use App\Http\Controllers\EmbalagemController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/teste', function () {
    return response()->json(['message' => 'API funcionando!']);
});

Route::get('/produtos/pesquisar', [ProdutoController::class, 'pesquisarProduto']);
Route::get('/embalagens/pesquisar', [EmbalagemController::class, 'pesquisarEmbalagem']);
Route::post('/embalagens/cadastrar', [EmbalagemController::class, 'cadastrarEmbalagem']);
