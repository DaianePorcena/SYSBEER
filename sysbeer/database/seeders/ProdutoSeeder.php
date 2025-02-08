<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produtos = [
            // Produtos originais
            ['nome' => 'Cerveja Pilsen', 'descricao' => 'Cerveja Pilsen', 'preco' => 2.50, 'embalagem_id' => 1, 'categoria_id' => 1, 'quantidadeEstoque' => 10],
            ['nome' => 'Cerveja IPA', 'descricao' => 'Cerveja IPA', 'preco' => 3.50, 'embalagem_id' => 2, 'categoria_id' => 1, 'quantidadeEstoque' => 15],
            ['nome' => 'Coca-Cola', 'descricao' => 'Refrigerante Cola', 'preco' => 2.00, 'embalagem_id' => 7, 'categoria_id' => 2, 'quantidadeEstoque' => 50],
            ['nome' => 'Fanta Laranja', 'descricao' => 'Refrigerante Laranja', 'preco' => 2.00, 'embalagem_id' => 7, 'categoria_id' => 2, 'quantidadeEstoque' => 50],
            ['nome' => 'Vodka Smirnoff', 'descricao' => 'Vodka Smirnoff', 'preco' => 30.00, 'embalagem_id' => 4, 'categoria_id' => 3, 'quantidadeEstoque' => 60],
            ['nome' => 'Suco de Laranja', 'descricao' => 'Suco de Laranja', 'preco' => 3.00, 'embalagem_id' => 9, 'categoria_id' => 4, 'quantidadeEstoque' => 73],
            ['nome' => 'Suco de Uva', 'descricao' => 'Suco de Uva', 'preco' => 3.00, 'embalagem_id' => 9, 'categoria_id' => 4, 'quantidadeEstoque' => 45],
            ['nome' => 'Suco de Maracujá', 'descricao' => 'Suco de Maracujá', 'preco' => 3.00, 'embalagem_id' => 9, 'categoria_id' => 4, 'quantidadeEstoque' => 10],
            ['nome' => 'Cerveja Weiss', 'descricao' => 'Cerveja de trigo com sabor suave', 'preco' => 3.20, 'embalagem_id' => 3, 'categoria_id' => 1, 'quantidadeEstoque' => 100],
            ['nome' => 'Cerveja Stout', 'descricao' => 'Cerveja escura e encorpada', 'preco' => 3.80, 'embalagem_id' => 6, 'categoria_id' => 1, 'quantidadeEstoque' => 100],
            ['nome' => 'Cerveja Ale', 'descricao' => 'Cerveja artesanal com notas frutadas', 'preco' => 3.00, 'embalagem_id' => 2, 'categoria_id' => 1, 'quantidadeEstoque' => 150],
            ['nome' => 'Guaraná Antarctica', 'descricao' => 'Refrigerante de guaraná tradicional', 'preco' => 2.50, 'embalagem_id' => 10, 'categoria_id' => 2, 'quantidadeEstoque' => 12],
            ['nome' => 'Sprite', 'descricao' => 'Refrigerante de limão', 'preco' => 2.30, 'embalagem_id' => 12, 'categoria_id' => 2, 'quantidadeEstoque' => 20],
            ['nome' => 'Vodka Absolut', 'descricao' => 'Vodka premium, perfeita para coquetéis', 'preco' => 32.00, 'embalagem_id' => 6, 'categoria_id' => 3, 'quantidadeEstoque' => 35],
            ['nome' => 'Rum Bacardi', 'descricao' => 'Rum branco para drinks tropicais', 'preco' => 28.00, 'embalagem_id' => 5, 'categoria_id' => 3, 'quantidadeEstoque' => 25],
            ['nome' => 'Whisky Jack Daniels', 'descricao' => 'Whisky de Tennessee com sabor marcante', 'preco' => 35.00, 'embalagem_id' => 6, 'categoria_id' => 3, 'quantidadeEstoque' => 50],
            ['nome' => 'Suco de Abacaxi', 'descricao' => 'Suco natural de abacaxi', 'preco' => 3.50, 'embalagem_id' => 12, 'categoria_id' => 4, 'quantidadeEstoque' => 90],
            ['nome' => 'Suco de Manga', 'descricao' => 'Suco 100% natural de manga', 'preco' => 3.20, 'embalagem_id' => 11, 'categoria_id' => 4, 'quantidadeEstoque' => 100],
            ['nome' => 'Suco de Acerola', 'descricao' => 'Suco rico em vitamina C', 'preco' => 3.00, 'embalagem_id' => 12, 'categoria_id' => 4, 'quantidadeEstoque' => 30],
            ['nome' => 'Refrigerante Tônica', 'descricao' => 'Refrigerante tônica para drinks', 'preco' => 2.80, 'embalagem_id' => 8, 'categoria_id' => 2, 'quantidadeEstoque' => 40],
            ['nome' => 'Refrigerante Guaraná Zero', 'descricao' => 'Refrigerante sem açúcar', 'preco' => 2.50, 'embalagem_id' => 2, 'categoria_id' => 2, 'quantidadeEstoque' => 20],
            ['nome' => 'Cerveja Bock', 'descricao' => 'Cerveja de sabor robusto', 'preco' => 3.40, 'embalagem_id' => 1, 'categoria_id' => 1, 'quantidadeEstoque' => 80],
            ['nome' => 'Cerveja Dunkel', 'descricao' => 'Cerveja escura de corpo médio', 'preco' => 3.60, 'embalagem_id' => 4, 'categoria_id' => 1, 'quantidadeEstoque' => 100],
        ];

        foreach ($produtos as $produto) {
            Produto::create($produto);
        }
    }
}
