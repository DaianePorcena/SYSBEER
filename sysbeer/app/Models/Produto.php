<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome', 
        'descricao', 
        'preco', 
        'quantidadeEstoque',
        'categoria_id',
        'embalagem_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }

    public function embalagem()
    {
        return $this->belongsTo(Embalagem::class, 'embalagem_id');
    }
}
