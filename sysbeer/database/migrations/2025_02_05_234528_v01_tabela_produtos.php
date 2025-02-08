<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('descricao', 250)->nullable();
            $table->decimal('preco', 10, 2);
            $table->integer('quantidadeEstoque');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade'); 
            $table->foreignId('embalagem_id')->constrained('embalagens')->onDelete('cascade'); 
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
