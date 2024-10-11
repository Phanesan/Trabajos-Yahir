<template>
    <div class="cards">
        <div class="card" v-for="movie in movies" :key="movie.id" @click="$emit('viewCinema', movie.id)">
            <div class="imgLabel">
                <img :src='"https://media.themoviedb.org/t/p/w220_and_h330_face/"+movie.backdrop_path' alt="banner">
            </div>
            <div class="contentCard">
                <h2>{{movie.title}}</h2>
                <p>{{movie.overview}}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'MoviesContent',
    props: {
        movies: {
            type: Array,
            required: true
        }
    },
    setup(movies) {
        //console.log('movies', movies)
    },
    mounted() {
        
    }
};
</script>

<style scoped>
.cards {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    height: 100%;
    width: 100%;
}

.card {
    display: flex;
    justify-content: top;
    align-items: center;
    flex-direction: column;
    height: 28rem;
    width: 18rem;
    background-color: #3d3d3d;
    margin-left: 2vw;
    margin-right: 2vw;
    margin-top: 2vh;
    margin-bottom: 2vh;
    border-radius: 0.6rem;
}

.card:hover {
    cursor: pointer;
    transform: scale(1.02);
    box-shadow: 9px 9px 33px #d1d1d1, -9px -9px 33px #ffffff;
    transition: 0.3s;
    transform: translateY(-2px);
}

.imgLabel {
    display: flex;
    justify-content: center;
    align-items: start;
    width: 100%;
    height: 68%;
    border-top-left-radius: 0.6rem;
    border-top-right-radius: 0.6rem;
    img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }
}

.contentCard {
    display: flex;
    justify-content: start;
    align-items: start;
    flex-direction: column;
    height: 32%;
    width: 100%;
    border-bottom-left-radius: 0.6rem;
    border-bottom-right-radius: 0.6rem;
    padding-left: 1rem;
    padding-right: 1rem;
    max-width: 100%;
    
    h2 {
        color: var(--color-text);
        margin-top: 0.15rem;
        max-width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    p {
        color: var(--color-text);
        margin-top: 0.6rem;
        max-width: 100%;
        display: -webkit-box;
        line-clamp: 3;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        word-wrap: break-word;
        overflow: hidden;
        text-overflow: ellipsis;
    }
}
</style>