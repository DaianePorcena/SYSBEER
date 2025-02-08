<template>
    <nav>
      <router-link to="/produtos">Produtos</router-link> |
      <router-link to="/embalagens">Embalagens</router-link>
    </nav>
  </template>
  
  <script>
  export default {
    name: 'NavBar',
  };
  </script>
  
  <style scoped>
  nav {
    padding: 10px;
    background-color: #f4f4f4;
    margin-bottom: 20px;
  }
  
  router-link {
    margin: 0 10px;
    text-decoration: none;
    color: #333;
  }
  </style>