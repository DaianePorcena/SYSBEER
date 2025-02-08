<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

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

        $query = Produto::with(['categoria', 'embalagem']);

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('categoria')) {
            $query->whereHas('categoria', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->categoria . '%');
            });
        }

        if ($request->filled('embalagem')) {
            $query->whereHas('embalagem', function ($q) use ($request) {
                $q->where('tipo', 'like', '%' . $request->embalagem . '%');
            });
        }

        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

        $produtos = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json($produtos);
    }
}
