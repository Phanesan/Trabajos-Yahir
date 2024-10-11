<template>
    <div class="cards" v-for="movie in movies">
        <div class="card">
            <div class="imgLabel">
                <img src="" alt="Avatar">
            </div>
            <div class="contentCard">
                <h2>Title</h2>
                <p>Description</p>
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
        console.log('movies', movies)
    },
    methods: {
        
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
    height: 68vh;
    width: 28vw;
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
        border-top-left-radius: 0.6rem;
        border-top-right-radius: 0.6rem;
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