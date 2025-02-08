<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function pesquisarProduto(Request $request)
    {
        $query = Produto::query();
        if ($request->has('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->has('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        if ($request->has('embalagem_id')) {
            $query->where('embalagem_id', $request->embalagem_id);
        }

        $perPage = $request->per_page ?? 10;
        $page = $request->page ?? 1;

        $produtos = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json($produtos);
    }
}
