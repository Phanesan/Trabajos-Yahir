<template>
  <div class="viewBody">
    <div class="general">
      <img
        class="banner"
        :src="'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/' + movieData.backdrop_path"
        alt="banner"
      />
      <div class="movie-card">
        <h2>{{ movieData.title }}</h2>
        <p>{{ movieData.overview }}</p>
        <p><strong>Rating:</strong> {{ movieData.vote_average }}/10</p>
        <p><strong>Votos:</strong> {{ movieData.vote_count }}</p>
        <p><strong>Fecha de estreno:</strong> {{ movieData.release_date }}</p>

        <div class="rating">
          <div class="rating">
            <span
              v-for="star in 10"
              :key="star"
              class="star"
              :class="{ filled: star <= currentRating }"
              @click="setRating(star)"
            >
              ★
            </span>
          </div>
        </div>
        <p style="font-size: 1.5em">Rating seleccionado: {{ currentRating }}</p>
        <button class="button" @click="deleteRating">Eliminar Rating</button>

        <BackButton class="backButton" @click="$emit('back')"/>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import { ref } from 'vue'
import BackButton from './BackButton.vue';

export default {
  name: 'View',
  props: {
    idView: {
      type: Number
    }
  },
  components: {
    BackButton
  },
  mounted() {
    const api_key = 'b268f05dee97359b50ef5b57232a727a'

    let config = {
      method: 'get',
      maxBodyLength: Infinity,
      url: `https://api.themoviedb.org/3/movie/${this.idView}?api_key=${api_key}`,
      headers: {}
    }

    axios
      .request(config)
      .then((response) => {
        this.movieData = response.data
        console.log(this.movieData)
      })
      .catch((error) => {
        console.log(error)
      })
  },
  data() {
    const movieData = ref({})
    const currentRating = ref(0)

    return {
      movieData,
      currentRating
    }
  },
  methods: {
    setRating(rating) {
      const api_key = 'b268f05dee97359b50ef5b57232a727a'

      let data = JSON.stringify({
        value: rating
      })

      let config = {
        method: 'post',
        maxBodyLength: Infinity,
        url: `https://api.themoviedb.org/3/movie/${this.idView}/rating?session_id=${localStorage.getItem('session_id')}&api_key=${api_key}`,
        headers: {
          'Content-Type': 'application/json'
        },
        data: data
      }

      axios
        .request(config)
        .then((response) => {
          console.log(response.data)
          this.currentRating = rating
        })
        .catch((error) => {
          console.log(error)
        })
    },
    deleteRating() {
      const api_key = 'b268f05dee97359b50ef5b57232a727a'
      let config = {
        method: 'delete',
        maxBodyLength: Infinity,
        url: `https://api.themoviedb.org/3/movie/${this.idView}/rating?session_id=${localStorage.getItem('session_id')}&api_key=${api_key}`,
        headers: {}
      }

      axios
        .request(config)
        .then((response) => {
          console.log(response.data)
          this.currentRating = 0
        })
        .catch((error) => {
          console.log(error)
        })
    }
  }
}
</script>

<style scoped>
.viewBody {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  width: 80vw;
  height: 100vh;
}

.general {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  width: 100%;
  height: 100%;
}

.banner {
  max-width: 40vw;
  max-height: 70vh;
}

.movie-card {
  border: 1px solid #ccc;
  padding: 20px;
  padding-top: 3rem;
  padding-bottom: 3rem;
  width: 100%;
  height: 70vh;
  background-color: #000000;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.movie-card h2 {
  font-size: 1.5em;
  margin-bottom: 4rem;
}

.movie-card p {
  margin: 5px 0;
  margin-bottom: 1rem;
}

.button {
  --bg: #e74c3c;
  --text-color: #fff;
  position: relative;
  width: 150px;
  border: none;
  background: var(--bg);
  color: var(--text-color);
  padding: 1em;
  font-weight: bold;
  text-transform: uppercase;
  transition: 0.2s;
  border-radius: 5px;
  opacity: 0.8;
  letter-spacing: 1px;
  box-shadow:
    #c0392b 0px 7px 2px,
    #000 0px 8px 5px;
}

.button:hover {
  opacity: 1;
}

.button:active {
  top: 4px;
  box-shadow:
    #c0392b 0px 3px 2px,
    #000 0px 3px 5px;
}

.rating {
  display: inline-block;
  font-size: 1.5em;
}

.star {
  cursor: pointer;
  color: #ddd;
}

.star.filled {
  color: #ffa500;
}

.star:hover {
  color: #ffd700;
  direction: ltr;
}

.backButton {
  position: absolute;
  top: 13vh;
  left: 3vw;
}
</style>
