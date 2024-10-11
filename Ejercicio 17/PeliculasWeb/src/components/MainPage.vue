<template>
    <div class="content">
        <Suspense>
            <template #default>
                <MoviesContent :movies="moviesData" @viewCinema="viewCinema" />
            </template>

            <template #fallback>
                Cargando...
            </template>
        </Suspense>
    </div>
</template>

<script>
import axios from "axios";
import { ref } from "vue";
import { defineAsyncComponent } from "vue";

export default {
    name: "MainPage",
    methods: {
        viewCinema(id) {
            console.log(id);
            this.$emit("viewCinema", id);
        }
    },
    data() {
        const moviesData = ref([]);

        return {
            moviesData
        }
    },
    mounted() {
        const api_key = "b268f05dee97359b50ef5b57232a727a";

        let config = {
        method: 'get',
        maxBodyLength: Infinity,
        url: `https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&page=1&language=es-MX&api_key=${api_key}`,
        headers: { }
        };

        axios.request(config)
        .then((response) => {
            this.moviesData = response.data.results;
            console.log(this.moviesData);
        })
        .catch((error) => {
        console.log(error);
        });
    },
    components: {
        MoviesContent: defineAsyncComponent(() => import('./Async/MoviesContent.vue'))
    }
};

</script>

<style scoped>
.content {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    flex: wrap;
    height: 100%;
    width: 80vw;
}
</style>