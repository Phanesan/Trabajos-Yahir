<template>
    <div>
      <h2>Editar usuario</h2>
      <form @submit.prevent="update">
        <label for="name">Nombre:</label>
        <input type="text" v-model="name">
        <label for="username">Usuario:</label>
        <input type="text" v-model="username">
        <label for="email">Correo:</label>
        <input type="text" v-model="email">
        <label for="password">Contraseña Nueva:</label>
        <input type="password" v-model="password" required>
        <button type="submit">Actualizar</button>
      </form>
    </div>
</template>

<script>
import { ref } from "vue";

export default {
  name: "EditForm",
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  setup(props) {
    const user = ref(props.user);

    const name = ref(user.value.name);
    const username = ref(user.value.username);
    const email = ref(user.value.email);
    const password = ref('');

    return {
      user,
      name,
      username,
      email,
      password
    }
  },
  methods: {
    update() {
      // Lógica para actualizar el usuario
      this.user.name = this.name;
      this.user.username = this.username;
      this.user.email = this.email;
      this.user.password = this.password;

      const users = JSON.parse(localStorage.getItem('users'));

      users.forEach(element => {
          if(element.id === this.user.id) {
              element.name = this.user.name;
              element.username = this.user.username;
              element.email = this.user.email;
              element.password = this.user.password;
          }
      })

      localStorage.setItem('users', JSON.stringify(users));

      console.log(JSON.parse(localStorage.getItem('users')))

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