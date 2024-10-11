<template>
  <header id="header">
    <h1>Películas</h1>
  </header>
  <div class="main">
    <!-- Formulario Login -->
    <LoginForm v-if="!logged" />
    <View v-else-if="idView" :idView="idView" />
    <MainPage v-else @viewCinema="viewCinema" />

  </div>
</template>

<script>
  import { ref } from 'vue';
  import LoginForm from './components/LoginForm.vue';
  import MainPage from './components/MainPage.vue';
  import View from './components/View.vue';

  export default {
    name: 'App',
    components: {
      LoginForm,
      MainPage,
      View
    },
    data() {
      const logged = ref(false);
      const idView = ref();

      return {
        logged,
        idView
      }
    },
    mounted() {
      if(localStorage.getItem('payload')) {
        this.logged = true;
      }
    },
    methods: {
      viewCinema(id) {
        this.idView = id
      }
    }
  }
</script>

<style scoped>

.main {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  width: 100vw;
  background-color: #140f07;
  margin-top: 8vh;
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