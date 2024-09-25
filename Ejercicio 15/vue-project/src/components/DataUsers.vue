<template>
    <div v-if="!isEditing && !isCreating">
      <h2>Lista de Usuarios</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.username }}</td>
            <td>{{ user.email }}</td>
            <td>
              <button @click="deleteUser(user.id)">Eliminar</button>
              <button @click="editUser(user.id)">Editar</button>
            </td>
          </tr>
        </tbody>
      </table>

      <button @click="createUser">Añadir usuario</button>
    </div>

    <div v-else-if="isEditing">
      <EditForm :user="user" />
    </div>

    <div v-if="isCreating">
      <CreateForm />
    </div>
  </template>

<script>
import { ref } from "vue";
import EditForm from "./EditForm.vue";
import CreateForm from "./CreateForm.vue";

export default {
  name: 'DataUsers',
  props: {
    users: {
      type: Array,
      required: true
    }
  },
  data() {
    const isEditing = ref(false);
    const isCreating = ref(false);
    const user = ref({});

    return {
      isEditing,
      isCreating,
      user
    }
  },
  methods: {
    deleteUser(id) {
      const index = this.users.findIndex(user => user.id === id);
      if (index !== -1) {
        this.users.splice(index, 1);
      }
    },
    editUser(id) {
      const index = this.users.findIndex(user => user.id === id);
      if (index !== -1) {
        this.user = this.users[index];
        this.isEditing = true;
      }

      console.log(this.isEditing)
      console.log(this.isCreating)
    },
    createUser() {
      this.isCreating = true;
      console.log(this.isEditing)
      console.log(this.isCreating)
    }
  },
  components: {
    EditForm,
    CreateForm
  }
}
</script>

<style scoped>
table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #0c0c0c;
}
</style>