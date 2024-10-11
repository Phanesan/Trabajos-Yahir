<template>
    <div class="loginForm">

        <div class="loginFormTop">
            <h1>Iniciar Sesión</h1>

            <form class="loginBottom">
                <div class="labelGroup">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" @modelValue="username" required>
                </div>

                <div class="labelGroup">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" @modelValue="password" required>
                </div>

                <button type="submit" @click.prevent="sendData">Iniciar Sesión</button>
            </form>
        </div>

    </div>
</template>

<script>
import { ref } from "vue";
import axios from "axios";

export default {
  name: "LoginForm",
  data() {

    const username = ref("");
    const password = ref("");

    return {
        username,
        password,
    }
  },
  methods: {
    sendData() {
        const api_key = "b268f05dee97359b50ef5b57232a727a";

        let config = {
          method: 'get',
          maxBodyLength: Infinity,
          url: 'https://api.themoviedb.org/3/authentication/token/new?api_key=' + api_key,
          headers: { }
        };

        axios.request(config)
        .then((response) => {
          console.log(username.value);
          let data = JSON.stringify({
            "username": username.value,
            "password": password.value,
            "request_token": response.data.request_token
          });

          let config = {
            method: 'post',
            maxBodyLength: Infinity,
            url: 'https://api.themoviedb.org/3/authentication/token/validate_with_login?api_key=' + api_key,
            headers: { 
              'Content-Type': 'application/json'
            },
            data : data
          };

          axios.request(config)
          .then((response) => {
            localStorage.setItem('payload', JSON.stringify(response.data));

            let data = JSON.stringify({
              "request_token": response.data.request_token
            });

            let config = {
              method: 'post',
              maxBodyLength: Infinity,
              url: 'https://api.themoviedb.org/3/authentication/session/new?api_key=' + api_key,
              headers: { 
                'Content-Type': 'application/json'
              },
              data : data
            };

            axios.request(config)
            .then((response) => {
              localStorage.setItem('session_id', response.data.session_id);
              window.location.reload();
            })
            .catch((error) => {
              console.log(error);
            });
          })
          .catch((error) => {
            console.log(error);
          });
        })
        .catch((error) => {
          console.log(error);
        });
    }
  }
};
</script>

<style scoped>
.loginForm {
  display: flex;
  background-color: rgb(0, 0, 0);
  height: 54vh;
  width: 20vw;
  border-radius: 1rem;
  margin-top: 10em;
  margin-bottom: 15em;
}

.loginFormTop {
  height: 8vh;
  width: 20vw;
  h1 {
    display: flex;
    color: var(--color-text);
    justify-content: center;
    align-items: center;
    margin: 1.3rem;
  }
}

.loginBottom {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 6vh;

  button {
    width: 8vw;
    height: 5vh;
    font-size: 1rem;
    border-radius: 0.5rem;
    margin: 1rem;
    margin-top: 4rem;
  }
}

.labelGroup {
  display: flex;
  flex-direction: column;
  margin: 1rem;
  label {
    color: var(--color-text);
    font-size: 1.3rem;
    margin-bottom: 0.2rem;
  }
  input {
    width: 15vw;
    height: 3vh;
    font-size: 1.3rem;
    border-radius: 0.5rem;
  }
}
</style>