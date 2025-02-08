<template>
  <div class="navbar-container">
    <nav class="navbar">
      <!-- Logo ou Título -->
      <router-link to="/" class="navbar-brand">
        SysBeer
      </router-link>

      <!-- Links de Navegação -->
      <ul class="navbar-links">
        <li>
          <router-link to="/produtos" class="navbar-link" active-class="active-link">
            Produtos
          </router-link>
        </li>
        <li>
          <router-link to="/embalagens" class="navbar-link" active-class="active-link">
            Embalagens
          </router-link>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  name: "NavBar",
};
</script>

<style scoped>

/* Container principal da navbar */
.navbar-container {
  background-color: var(--marrom-escuro); 
  padding: 15px 20px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Sombra sutil */
}

/* Navbar */
.navbar {
  display: flex;
  justify-content: space-between; 
  align-items: center;
  max-width: 1200px; 
  margin: 0 auto; 
}

/* Título ou Logo */
.navbar-brand {
  font-size: 1.8rem;
  font-weight: bold;
  color: var(--dourado); 
  text-decoration: none;
}

/* Links de navegação */
.navbar-links {
  display: flex;
  list-style: none; 
  margin: 0;
  padding: 0;
}

/* Cada link na navbar */
.navbar-link {
  margin-left: 20px; 
  font-size: 1rem;
  font-weight: 500;
  text-decoration: none;
  color: var(--bege); 
  padding: 8px 12px; 
  border-radius: 5px; 
  transition: background-color 0.3s ease, color 0.3s ease; 
}

/* Links ativos */
.active-link {
  background-color: var(--ambar); 
  color: var(--branco); 
}

/* Hover nos links */
.navbar-link:hover {
  background-color: var(--dourado); 
  color: #4A2C2A; 
}
</style>
