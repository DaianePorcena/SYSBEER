<?php

namespace App\Services;

use App\Models\Produto;

class ProdutoService
{
    public function pesquisarProdutos(array $filtros)
    {
        $query = Produto::with(['categoria', 'embalagem']);

        if (isset($filtros['nome'])) {
            $query->where('nome', 'like', '%' . $filtros['nome'] . '%');
        }

        if (isset($filtros['categoria'])) {
            $query->whereHas('categoria', function ($q) use ($filtros) {
                $q->where('nome', 'like', '%' . $filtros['categoria'] . '%');
            });
        }

        if (isset($filtros['embalagem'])) {
            $query->whereHas('embalagem', function ($q) use ($filtros) {
                $q->where('tipo', 'like', '%' . $filtros['embalagem'] . '%');
            });
        }

        $perPage = $filtros['per_page'] ?? 10;
        $page = $filtros['page'] ?? 1;

        return $query->paginate($perPage, ['*'], 'page', $page);
    }
}
