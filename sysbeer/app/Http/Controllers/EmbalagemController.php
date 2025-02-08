<?php

namespace App\Http\Controllers;

use App\Models\Embalagem;
use Illuminate\Http\Request;

class EmbalagemController extends Controller
{
    public function pesquisarEmbalagem(Request $request)
    {
        $query = Embalagem::query();
        if ($request->has('tipo')) {
            $query->where('tipo', 'like', '%' . $request->nome . '%');
        }

        $perPage = $request->per_page ?? 10;
        $page = $request->page ?? 1;

        $embalagens = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json($embalagens);
    }

    public function cadastrarEmbalagem(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string'
        ]);

        $embalagens = Embalagem::create($request->all());

        return response()->json($embalagens, 201);
    }
}
