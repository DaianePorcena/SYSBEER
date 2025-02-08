<template>
  <div>
    <Navbar /> <!-- Navbar fixa na página -->
    <router-view></router-view> <!-- Aqui as views serão renderizadas -->
  </div>
</template>

<script>
import Navbar from './components/NavBar.vue';

export default {
  components: {
    Navbar,
  },
};
</script>

<style>
/* Estilos globais */
</style>
