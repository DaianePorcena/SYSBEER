<template>
  <div class="embalagens-container">
    <h1 class="page-title mb-4">Embalagens</h1>

    <!-- Filtros -->
    <div class="mb-3 filters-container">
      <input
        v-model="filters.tipo"
        placeholder="Buscar por tipo de embalagem"
        class="form-control filter-input mb-3"
      />
      <button @click="fetchEmbalagens" class="btn btn-dourado">
        Pesquisar
      </button>
    </div>

    <!-- Tabela de Embalagens -->
    <table class="embalagens-table table table-hover table-bordered">
      <thead class="bg-marrom text-bege">
        <tr>
          <th>Código</th>
          <th>Tipo</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="embalagem in embalagens.data" :key="embalagem.id">
          <td>{{ embalagem.id }}</td>
          <td>{{ embalagem.tipo }}</td>
        </tr>
      </tbody>
    </table>

    <!-- Paginação -->
    <div class="d-flex justify-content-between align-items-center pagination-container">
      <div>
        <label for="perPage" class="text-bege">Itens por página:</label>
        <select
          v-model="pagination.perPage"
          @change="fetchEmbalagens"
          class="form-select"
        >
          <option
            v-for="option in perPageOptions"
            :key="option"
            :value="option"
          >
            {{ option }}
          </option>
        </select>
      </div>
      <div class="pagination-buttons">
        <button
          @click="changePage(pagination.page - 1)"
          :disabled="pagination.page === 1"
          class="btn btn-secondary"
        >
          Anterior
        </button>
        <span class="text-bege">
          Página {{ pagination.page }} de {{ embalagens.last_page }}
        </span>
        <button
          @click="changePage(pagination.page + 1)"
          :disabled="pagination.page === embalagens.last_page"
          class="btn btn-secondary"
        >
          Próximo
        </button>
      </div>
    </div>

    <!-- Cadastro de Embalagens -->
    <div class="mt-4 cadastrar-container">
      <h2 class="text-bege">Cadastrar Embalagem</h2>
      <div class="mb-3">
        <input
          v-model="novaEmbalagem.tipo"
          placeholder="Tipo de embalagem"
          class="form-control filter-input"
        />
      </div>
      <button @click="cadastrarEmbalagem" class="btn btn-dourado">
        Cadastrar
      </button>
    </div>
  </div>
</template>

<script>
import api from '../src/api';

export default {
  data() {
    return {
      embalagens: {
        data: [],
        last_page: 1,
      },
      filters: {
        tipo: '',
      },
      pagination: {
        page: 1,
        perPage: 5,
      },
      perPageOptions: [5, 10, 15, 20],
      novaEmbalagem: {
        tipo: '',
      },
    };
  },
  methods: {
    async fetchEmbalagens() {
      const params = {
        ...this.filters,
        page: this.pagination.page,
        per_page: this.pagination.perPage,
      };
      const response = await api.get('/embalagens/pesquisar', { params });
      this.embalagens = response.data;
    },
    changePage(page) {
      if (page > 0 && page <= this.embalagens.last_page) {
        this.pagination.page = page;
        this.fetchEmbalagens();
      }
    },
    async cadastrarEmbalagem() {
      try {
        await api.post('/embalagens/cadastrar', this.novaEmbalagem);
        this.novaEmbalagem.tipo = '';
        this.fetchEmbalagens();
      } catch (error) {
        console.error('Erro ao cadastrar embalagem:', error);
      }
    },
  },
  mounted() {
    this.fetchEmbalagens();
  },
};
</script>

<style scoped>
/* Container principal da página */
.embalagens-container {
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

.embalagens-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.embalagens-table th,
.embalagens-table td {
  padding: 12px;
  text-align: left;
  border: 1px solid var(--bege); 
}

.embalagens-table thead {
  background-color: var(--marrom-escuro); 
  color: var(--bege); 
}

/* Paginação */
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
  color: var(--marrom-escuro) !important;
}
</style>
