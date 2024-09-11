<template>
  <div id="app">
    <!-- Arreglo de lista -->
    <ul>
      <li id="item" v-for="item in data">
        <p>ID:</p>
        <p id="field">{{ item.id }}</p>
        <p>Nombre:</p>
        <p id="field">{{ item.name }}</p>
        <p>Edad:</p>
        <p id="field">{{ item.age }}</p>
      </li>
    </ul>

    <!-- Formulario -->
    <div>
      <form id="formulario">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" v-model="id">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" v-model="name">
        <label for="age">Edad:</label>
        <input type="text" id="age" name="age" v-model="age">
        <button id="button" type="submit" @click.prevent="store">Enviar</button>
      </form>
    </div>
  </div>

</template>

<script>
import { ref } from "vue";

export default {
  data() {

    const data = ref([]);

    return {
      data
    };
  },
  methods: {
    store () {
      this.data.push({id: this.id, name: this.name, age: this.age});

      this.id = "";
      this.name = "";
      this.age = "";
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