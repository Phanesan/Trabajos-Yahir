<template>
  <header id="header">
    <h1>Películas</h1>
  </header>
  <div class="main">
    <!-- Formulario Login -->
    <LoginForm v-if="!logged" />
    <MainPage v-else />

  </div>
</template>

<script>
  import { ref } from 'vue';
  import LoginForm from './components/LoginForm.vue';
  import MainPage from './components/MainPage.vue';

  export default {
    name: 'App',
    components: {
      LoginForm,
      MainPage
    },
    data() {
      const logged = ref(false);

      return {
        logged
      }
    },
    mounted() {
      if(localStorage.getItem('payload')) {
        this.logged = true;
      }
    }
  }
</script>

<style scoped>

.main {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  width: 100vw;
  background-color: #140f07;
}

#header {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 8vh;
  width: 100vw;
  h1 {
    display: flex;
    color: var(--color-text);
    justify-content: center;
    align-items: center;
    margin: 1.3rem;
  }
  background-color: #3e3892;
  position: fixed;
}
</style>