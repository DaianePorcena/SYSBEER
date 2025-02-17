<?php

namespace App\Http\Controllers;

use App\Factories\FactoryEmbalagemInterface;
use App\Models\Embalagem;
use Illuminate\Http\Request;

class EmbalagemController extends Controller
{
    private FactoryEmbalagemInterface $factoryEmbalagem;

    public function __construct(FactoryEmbalagemInterface $factoryEmbalagem)
    {
        $this->factoryEmbalagem = $factoryEmbalagem;
    }
    
    public function pesquisarEmbalagem(Request $request)
    {
        $request->validate([
            'tipo' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1',
            'page' => 'nullable|integer|min:1',
        ]);

        $query = Embalagem::query();

        if ($request->filled('tipo')) {
            $query->where('tipo', 'like', '%' . $request->tipo . '%');
        }

        $perPage = $request->input('per_page', 5);
        $page = $request->input('page', 1);

        $embalagens = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json($embalagens);
    }

    public function cadastrarEmbalagem(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
        ]);

        $embalagem = $this->factoryEmbalagem->criar($request->tipo);

        return response()->json($embalagem, 201);
    }
}
