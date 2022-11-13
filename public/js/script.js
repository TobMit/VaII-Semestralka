// TMDB

// TODO Pre uplnú funkčnosť treba vytvoriť ešte js file s nazvom config kde uložíme pomocou premennej uložíme vlastný API_KEY

const API_KEY_URL = 'api_key=' + API_KEY;
const BASE_URL = 'https://api.themoviedb.org/3/';
const POP_MOVIE = '/trending/all/week?';
// BASE_REQUEST = BASE_URL + "request" + API_KEY

getMovies(BASE_URL+POP_MOVIE+API_KEY_URL);

function getMovies(url) {
    fetch(url).then(res => res.json()).then(data => {
        console.log(data);
    })
}