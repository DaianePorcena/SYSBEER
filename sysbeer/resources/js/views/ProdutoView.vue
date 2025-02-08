<template>
    <div class="produtos-container">
        <h1 class="page-title mb-4">Produtos</h1>
        <!-- Filtros -->
        <div class="mb-3 filters-container">
            <input v-model="filters.nome" placeholder="Buscar por nome" class="form-control filter-input mb-3" />
            <input v-model="filters.categoria" placeholder="Buscar por categoria"
                class="form-control filter-input mb-3" />
            <input v-model="filters.embalagem" placeholder="Buscar por embalagem"
                class="form-control filter-input mb-3" />
            <button @click="fetchProdutos" class="btn btn-dourado">
                Pesquisar
            </button>
        </div>

        <!-- Tabela de Produtos -->
        <table class="produtos-table table table-hover table-bordered ">
            <thead class="bg-marrom text-bege">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th>Embalagem</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="produto in produtos.data" :key="produto.id">
                    <td>{{ produto.id }}</td>
                    <td>{{ produto.nome }}</td>
                    <td>{{ produto.descricao }}</td>
                    <td>R$ {{ produto.preco }}</td>
                    <td>{{ produto.quantidadeEstoque }}</td>
                    <td>{{ produto.categoria ? produto.categoria.nome : 'N/A' }}</td>
                    <td>{{ produto.embalagem ? produto.embalagem.tipo : 'N/A' }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Paginação -->
        <div class="d-flex justify-content-between align-items-center pagination-container">
            <div>
                <label class="text-bege" for="perPage">Itens por página:</label>
                <select v-model="pagination.perPage" @change="fetchProdutos" class="form-select">
                    <option v-for="option in perPageOptions" :key="option" :value="option">
                        {{ option }}
                    </option>
                </select>
            </div>
            <div class="pagination-buttons">
                <button @click="changePage(pagination.page - 1)" :disabled="pagination.page === 1"
                    class="btn btn-secondary">
                    Anterior
                </button>
                <span class="text-bege">Página {{ pagination.page }} de {{ produtos.last_page }}</span>
                <button @click="changePage(pagination.page + 1)" :disabled="pagination.page === produtos.last_page"
                    class="btn btn-secondary">
                    Próximo
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import api from '../src/api';

export default {
    data() {
        return {
            produtos: {
                data: [],
                last_page: 1,
            },
            filters: {
                nome: '',
                categoria: '',
                embalagem: '',
            },
            pagination: {
                page: 1,
                perPage: 10,
            },
            perPageOptions: [5, 10, 15, 20],
        };
    },
    methods: {
        async fetchProdutos() {
            const params = {
                ...this.filters,
                page: this.pagination.page,
                per_page: this.pagination.perPage,
            };
            const response = await api.get('/produtos/pesquisar', { params });
            this.produtos = response.data;
        },
        changePage(page) {
            if (page > 0 && page <= this.produtos.last_page) {
                this.pagination.page = page;
                this.fetchProdutos();
            }
        },
    },
    mounted() {
        this.fetchProdutos();
    },
};
</script>

<style scoped>

/* Container principal da página */
.produtos-container {
    background-color: var(--marrom-escuro);
    padding: 20px;
    margin: 60px;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.page-title {
    color: var(--dourado);
    text-align: center;
    font-size: 2rem;
    margin-bottom: 20px;
}

.text-bege {
    color: var(--bege);
}

.filters-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    gap: 15px;
}

.filter-input {
    flex: 1;
    min-width: 200px;
    border: 1px solid var(--bege);
    border-radius: 5px;
    padding: 8px;
    background-color: var(--bege);
}

.btn-dourado {
    background-color: var(--dourado);
    color: var(--marrom-escuro);
    border-radius: 5px;
    height: 42px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-dourado:hover {
    background-color: var(--ambar);
    color: var(--branco);
}

.produtos-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.produtos-table th,
.produtos-table td {
    padding: 12px;
    text-align: left;
    border: 1px solid var(--bege);
}

.produtos-table thead {
    background-color: var(--marrom-escuro);
    color: var(--dourado)
}

.pagination-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

.pagination-buttons {
    display: flex;
    gap: 10px;
}

.pagination-buttons button {
    background-color: var(--ambar);
    color: var(--branco);
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.pagination-buttons button:hover {
    background-color: var(--dourado);
    color: #4A2C2A;
}
</style>