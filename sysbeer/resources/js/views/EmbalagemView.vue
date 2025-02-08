<template>
    <div>
      <h1>Embalagens</h1>
      <Alert :type="alertType" :message="alertMessage" :visible="alertVisible" />
      <div>
        <input v-model="filters.tipo" placeholder="Tipo de embalagem" />
        <button @click="pesquisarEmbalagens">Pesquisar</button>
      </div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="embalagem in embalagens" :key="embalagem.id">
            <td>{{ embalagem.id }}</td>
            <td>{{ embalagem.tipo }}</td>
          </tr>
        </tbody>
      </table>
      <div>
        <h2>Cadastrar Embalagem</h2>
        <input v-model="novaEmbalagem.tipo" placeholder="Tipo de embalagem" />
        <button @click="cadastrarEmbalagem">Cadastrar</button>
      </div>
    </div>
  </template>
  
  <script>
  import api from '../src/api';
  import Alert from '../components/Alert.vue';
  
  export default {
    components: {
      Alert,
    },
    data() {
      return {
        embalagens: [],
        filters: {
          tipo: '',
        },
        novaEmbalagem: {
          tipo: '',
        },
        alertType: 'success',
        alertMessage: '',
        alertVisible: false,
      };
    },
    async created() {
      await this.pesquisarEmbalagens();
    },
    methods: {
      async pesquisarEmbalagens() {
        try {
          const response = await api.get('/embalagens/pesquisar', {
            params: this.filters,
          });
          this.embalagens = response.data.data;
  
          if (this.embalagens.length === 0) {
            this.showAlert('Nenhuma embalagem encontrada.', 'error');
          }
        } catch (error) {
          this.showAlert('Erro ao buscar embalagens.', 'error');
        }
      },
      async cadastrarEmbalagem() {
        if (!this.novaEmbalagem.tipo) {
          this.showAlert('O campo tipo é obrigatório.', 'error');
          return;
        }
  
        try {
          const response = await api.post('/embalagens/cadastrar', this.novaEmbalagem);
          this.embalagens.push(response.data);
          this.novaEmbalagem.tipo = '';
          this.showAlert('Embalagem cadastrada com sucesso!', 'success');
        } catch (error) {
          this.showAlert('Erro ao cadastrar embalagem.', 'error');
        }
      },
      showAlert(message, type = 'success') {
        this.alertMessage = message;
        this.alertType = type;
        this.alertVisible = true;
        setTimeout(() => {
          this.alertVisible = false;
        }, 3000);
      },
    },
  };
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