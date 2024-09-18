<template>
  <div id="app">
    <!-- Formulario -->
    <div v-if="logged === false">
      <form id="formulario" @submit.prevent="store">
        <label for="id">Correo:</label>
        <input type="text" v-model="email">
        <label for="name">Contraseña:</label>
        <input type="text" v-model="password">
        <button id="button" type="submit">Enviar</button>
      </form>
    </div>

    <div v-if="logged">
      <p>Has iniciado sesión</p>
    </div>
  </div>

</template>

<script>
import { ref } from "vue";

export default {
  data() {

    const email = ref("");
    const password = ref("");
    const logged = ref(false);

    return {
      email,
      password,
      logged
    };
  },
  methods: {
    store () {
      // Peticion a un JSON
      fetch('users.json')
        .then(response => response.json())
        .then(json => {
          json.forEach(element => {
            if(element.email === this.email && element.password === this.password) {
              this.logged = ref(true);
            }
          });
          
        })

      
    }
  }
};
</script>

<style>
#formulario {
  display: flex;
  flex-direction: column;
}
#button {
  margin-top: 3vh;
}
#app {
  display: flex;
  flex-direction: column;
}
#item {
  display: flex;
  flex-direction: row;
}
#field {
  margin-right: 1vw;
}
</style>