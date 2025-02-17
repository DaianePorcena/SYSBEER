<?php

namespace App\Http\Controllers;

use App\Facades\ProdutoFacade as FacadesProdutoFacade;
use App\Models\Produto;
use Illuminate\Http\Request;
use ProdutoFacade;

class ProdutoController extends Controller
{
    public function pesquisarProduto(Request $request)
    {
        $request->validate([
            'nome' => 'nullable|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'embalagem' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1',
            'page' => 'nullable|integer|min:1',
        ]);

        $filtros = $request->only(['nome', 'categoria', 'embalagem', 'per_page', 'page']);
        $produtos = FacadesProdutoFacade::pesquisarProdutos($filtros);

        return response()->json($produtos);
    }
}
