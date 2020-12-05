<template>
  <div>
      <div v-for="movie in movies" :key="movie.id">
          <h1>{{movie.original_title}}</h1>
      </div>
  </div>
</template>

<script>
import Vue from 'vue'

export default {
components: {
        //'header-movies': HeaderMovies,
       // 'footer-movies': FooterMovies,
    },
    data() {
        return {
            movies: [],
        }
    },
    methods: {
        
    },
    mounted() {
        axios.get('https://api.themoviedb.org/3/trending/movie/week?api_key=4ec327e462149c3710d63be84b81cf4f').then(response => {
            console.log(response);
            this.movies = response.data.results;
            console.log(this.movies);
        });
            }
}
</script>

<style>

</style>