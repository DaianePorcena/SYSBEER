import api from "../src/api";
import { defineStore } from "pinia";

export const useProdutoStore = defineStore('produto', {
    state: () => ({
        produtos: [],
        produto: {},
        filters:{
            nome: '', 
            categoria_id: '',
            embalagem_id: '',
        },
        pagination: {
            current_page: 1,
            last_page: 1,
          },

    }),
    actions: {
        async fetchProdutos() {
            try {
                // Filtrar apenas os parâmetros que possuem valor
                const params = Object.fromEntries(
                    Object.entries({
                        ...this.filters,
                        page: this.pagination.current_page,
                        per_page: this.pagination.per_page || 10, // Usa 10 como valor padrão
                    }).filter(([_, value]) => value !== '' && value !== null)
                );
        
                console.log('Parâmetros enviados para a API:', params);
        
                const response = await api.get('/produtos/pesquisar', { params });
        
                console.log('Resposta da API:', response.data);
        
                this.produtos = response.data.data;
                this.pagination.current_page = response.data.current_page;
                this.pagination.last_page = response.data.last_page;
            } catch (error) {
                console.error('Erro ao buscar produtos:', error);
            }
        },
          setFilter(key, value) {
            this.filters[key] = value;
          },
          setPage(page) {
            if (page >= 1 && page <= this.pagination.last_page) {
              this.pagination.current_page = page;
              this.fetchProdutos();
            }
          },
    },
})