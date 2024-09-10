<template>
  <form>
    <label for="text">Texto:</label>
    <input type="text" id="text" v-model="text" />
    <p>{{ text }}</p>
    <br />
    <label for="num1">Numero 1:</label>
    <input type="text" id="num1" v-model="num1" />
    <br />
    <label for="num2">Numero 2:</label>
    <input type="text" id="num2" v-model="num2" />
    <br />
    <button @click.prevent="sumar">Sumar</button>
  </form>
  <br />
  <p>{{ resultado }}</p>
</template>

<script>
import { ref } from "vue";

export default {
  data() {

    const text = ref("");
    const num1 = ref(0);
    const num2 = ref(0);
    const resultado = ref("");
    const sumar = () => {
      resultado.value = parseInt(num1.value) + parseInt(num2.value);
    }

    return {
      text,
      num1,
      num2,
      sumar,
      resultado
    };
  }
};
</script>