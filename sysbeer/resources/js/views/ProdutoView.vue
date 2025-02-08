<template>
    <div>
      <h1>Produtos</h1>
      <Alert :type="alertType" :message="alertMessage" :visible="alertVisible" />
      <div>
        <input v-model="filters.nome" placeholder="Nome do produto" />
        <input v-model="filters.categoria_id" placeholder="ID da categoria" />
        <input v-model="filters.embalagem_id" placeholder="ID da embalagem" />
        <button @click="fetchProdutos">Pesquisar</button>
      </div>
      <table>
        <thead>
          <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Embalagem</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="produto in produtos" :key="produto.id">
            <td>{{ produto.nome }}</td>
            <td>{{ produto.descricao }}</td>
            <td>{{ produto.preco }}</td>
            <td>{{ produto.categoria_id }}</td>
            <td>{{ produto.embalagem_id }}</td>
          </tr>
        </tbody>
      </table>
      <div>
        <button @click="setPage(pagination.current_page - 1)" :disabled="pagination.current_page === 1">Anterior</button>
        <span>Página {{ pagination.current_page }} de {{ pagination.last_page }}</span>
        <button @click="setPage(pagination.current_page + 1)" :disabled="pagination.current_page === pagination.last_page">Próxima</button>
      </div>
    </div>
  </template>
  
  <script setup>
  
  import { ref, computed, onMounted } from 'vue';
  import { useProdutoStore } from '../stores/produtoStore';
  import Alert from '../components/Alert.vue';
  
  const produtoStore = useProdutoStore();
  const { produtos, filters, pagination } = produtoStore;
  
  const alertType = ref('success');
  const alertMessage = ref('');
  const alertVisible = ref(false);
  
  const fetchProdutos = async () => {
    console.log('Parâmetros enviados:', {
        ...produtoStore.filters,
        page: produtoStore.pagination.current_page,
    });
    await produtoStore.fetchProdutos();
    if (produtos.length === 0) {
      showAlert('Nenhum produto encontrado.', 'error');
    }
  };
  
  const setPage = (page) => {
    produtoStore.setPage(page);
  };
  
  const showAlert = (message, type = 'success') => {
    alertMessage.value = message;
    alertType.value = type;
    alertVisible.value = true;
    setTimeout(() => {
      alertVisible.value = false;
    }, 3000);
  };
  
  onMounted(() => {
    fetchProdutos();
  });
  </script>
  
  <style scoped>
  table {
    width: 100%;
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid #ddd;
    padding: 8px;
  }
  </style>