<template>
    <div class="bg-gray-700 border-b border-gray-500">
        <header-movies></header-movies>
            <div class="container mx-auto p-5" style="min-height:100vh">
                <div class="bg-gray-800">
                    <div class="container mx-auto p-5">
                        <h3 class="text-gray-200 text-2xl">Listagem dos filmes</h3>
                        <hr class="bg-gray-200 mb-5">
                        <p class="text-gray-200 text-lg">
                            A pesquisa deve ser feita sempre iniciando o nome do filme com a letra maiúscula!
                        </p>
                    </div>
                </div>
                <input v-model="search" class="w-full p-5 rounded my-7" type="text" placeholder="Pesquisar filmes...">
                <div class="grid xl:grid-cols-4 gap-4 md:grid-cols-2 sm:grid-cols-1">
                    <div class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 cursor-pointer rounded bg-gray-400 p-5 mb-5"
                    style="max-width:356px;"
                     v-for="movie in filteredMovies" :key="movie.id"
                     v-on:click="movieDetails(movie.id)">
                        <div class="flex flex-col flex-wrap justify-center">
                            <img :src="movie.poster_path" class="shadow-xl mb-1 mr-1" height="550px" width="300px"/><br>
                            <h1 class="text-2xl text-gray-800">{{movie.original_title}}</h1>
                            <span class="text-gray-700">{{movie.release_date}}</span>
                            <p class="text-gray-600">{{movie.overview}}</p>
                        </div>
                    </div>
                </div>
            </div>
        <footer-movies></footer-movies>
    </div>
</template>

<script>
import Vue from 'vue'
import HeaderMovies from './HeaderMovies'
import FooterMovies from './FooterMovies'

export default {
components: {
        'header-movies': HeaderMovies,
        'footer-movies': FooterMovies,
    },
    data() {
        return {
            weekTrendingMovies: [],
            search: '',
            //genres: []
        }
    },
    computed: {
        filteredMovies: function() {
            return this.weekTrendingMovies.filter((movie) => {
                return movie.original_title.match(this.search);
            })
        }
    },
    methods: {
        movieDetails: function(movieId){
            axios.get(`/movies/detail/${movieId}`).then(response => {
                window.location.replace(`/movies/detail/${movieId}`);
            });
        }
    },
    mounted() {
        axios.get('/api/week/movies').then(response => {
            
            this.weekTrendingMovies = response.data.weekTrendingMovies;

            for (var m = 0; m < this.weekTrendingMovies.length; m++) {
                // poster url
                this.weekTrendingMovies[m].poster_path = "https://image.tmdb.org/t/p/w500" + this.weekTrendingMovies[m].poster_path;
                // poster url - end

                // release date format
                var releaseDateArray = this.weekTrendingMovies[m].release_date.split("-");
                this.weekTrendingMovies[m].release_date = releaseDateArray[2]+"/"+releaseDateArray[1]+"/"+releaseDateArray[0];
                // release date format - end
            }

            console.log(response);
        });

        /*axios.get('/api/movies/genres').then(response => {
            this.genres = response.data.genres;

            Explicação no movies controller...
        });*/
    }
}
</script>

<style>

</style>