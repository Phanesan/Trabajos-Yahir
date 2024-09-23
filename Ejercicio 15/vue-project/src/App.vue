<template>
  <div id="app">
    <!-- Formulario -->
    <div v-if="logged === false">
      <form id="formulario" @submit.prevent="store">
        <label for="id">Correo:</label>
        <input type="text" v-model="email">
        <label for="name">Contraseña:</label>
        <input type="password" v-model="password" required>
        <button id="button" type="submit">Enviar</button>
      </form>
    </div>

    <div v-if="logged">
      <Suspense>
        <template #default>
          <DataUsers :users="users" />
        </template>

        <template #fallback>
          <p>Cargando...</p>
        </template>
      </Suspense>
    </div>
  </div>

</template>

<script>
import { ref } from "vue";
import { defineAsyncComponent } from "vue";

export default {
  data() {

    const email = ref("");
    const password = ref("");
    const logged = ref(false);
    const users = ref([]);

    return {
      email,
      password,
      logged,
      users
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
              this.users = json;
              this.logged = ref(true);
            }
          });
          
        })
    }
  },
  components: {
    DataUsers: defineAsyncComponent(() => import('./components/DataUsers.vue'))
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