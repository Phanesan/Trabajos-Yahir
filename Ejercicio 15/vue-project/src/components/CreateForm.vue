<template>
    <div>
      <h2>Crear usuario</h2>
      <form @submit.prevent="update">
        <label for="ID">ID:</label>
        <input type="text" v-model="id" required>
        <label for="name">Nombre:</label>
        <input type="text" v-model="name" required>
        <label for="username">Usuario:</label>
        <input type="text" v-model="username" required>
        <label for="email">Correo:</label>
        <input type="text" v-model="email" required>
        <label for="password">Contraseña Nueva:</label>
        <input type="password" v-model="password" required>
        <button type="submit">Añadir</button>
      </form>
    </div>
</template>

<script>
import { ref } from "vue";

export default {
  name: "CreateForm",
  setup() {
    const id = ref('');
    const name = ref('');
    const username = ref('');
    const email = ref('');
    const password = ref('');

    return {
      id,
      name,
      username,
      email,
      password,
    }
  },
  methods: {
    update() {
      // Lógica para crear el usuario

      const users = JSON.parse(localStorage.getItem('users'));
      users.forEach(element => {
        if(element.id === parseInt(this.id)) {
          return;
        }
      })

      const user = {
        id: parseInt(this.id),
        name: this.name,
        username: this.username,
        email: this.email,
        password: this.password
      };

      users.push(user);
      localStorage.setItem('users', JSON.stringify(users));

      window.location.reload();
    }
  }
}
</script>

<style scoped>

div {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

label {
  margin-top: 10px;
}

input {
  margin-top: 10px;
}

button {
  margin-top: 10px;
}

h2 {
  margin-top: 20px;
}

</style>