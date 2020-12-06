<template>
    <div class="bg-gray-700">
        <header-movies></header-movies>
        <div class="container mx-auto p-5" style="min-height:100vh">
            <div class="my-8">
                <a class="p-3 rounded border border-green-500 text-xl text-green-500" href="/movies">Voltar</a>
            </div>

            <div class="flex justify-between items-center border-b border-white pb-6">
                <div class="mr-5">
                    <img :src="movieInfo.poster_path" class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 shadow-xl mb-1 mr-1" height="750px" width="500px"/><br>
                </div>
                <div class="">
                    <h1 class="text-4xl mb-5 text-white">{{movieInfo.original_title}}</h1>
                    <span class="text-gray-200 text-3xl mb-3">Data de Lançamento: {{movieInfo.release_date}}</span><br><br>
                    <span class="text-gray-200 text-3xl mb-3">Tagline: {{false ? movieInfo.tagline : "Ainda não tem tagline..."}}</span><br><br>
                    <span class="text-gray-200 text-3xl mb-3">Ratings: {{movieInfo.vote_average}} ⭐</span><br><br>
                    <span class="text-gray-200 text-3xl mb-3">Contagem de Votos: {{movieInfo.vote_count}}</span><br><br>
                </div>
            </div>

            <div class="my-6">
                <h2 class="text-4xl text-white mb-4">Overview</h2>
                <p class="font-mono text-3xl text-white mt-2">{{movieInfo.overview}}</p>
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
            movieInfo: [],
        }
    },
    methods: {
        
    },
    mounted() {
        axios.get('/api/movie/detail').then(response => {
            this.movieInfo = response.data.movieInfos
            console.log(this.movieInfo);
           
                // poster url
                this.movieInfo.poster_path = "https://image.tmdb.org/t/p/w500" + this.movieInfo.poster_path;
                // poster url - end

                // release date format
                var releaseDateArray = this.movieInfo.release_date.split("-");
                this.movieInfo.release_date = releaseDateArray[2]+"/"+releaseDateArray[1]+"/"+releaseDateArray[0];
                // release date format - end
        });
    }
}
</script>

<style>

</style>