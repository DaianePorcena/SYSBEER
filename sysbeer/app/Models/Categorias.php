<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome'
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'categoria_id');
    }
}
