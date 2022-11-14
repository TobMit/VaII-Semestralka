// TMDB

// TODO Pre uplnú funkčnosť treba vytvoriť ešte js file s nazvom config kde uložíme pomocou premennej uložíme vlastný API_KEY

const API_KEY_URL = 'api_key=' + API_KEY;
const BASE_URL = 'https://api.themoviedb.org/3';
const POP_MOVIE = '/trending/all/week?';
const IMG_URL = 'https://image.tmdb.org/t/p/w500';
// BASE_REQUEST = BASE_URL + "request" + API_KEY

getMovies(BASE_URL+POP_MOVIE+API_KEY_URL);

function getMovies(url) {
    //zíkame url request, response uložime do res.json a potom prístpime k dátam
    fetch(url).then(res => res.json()).then(data => {
        console.log(data);

        //aby sme nemuseli parsovať všetko iba result object
        showMovies(data.results);
    })
}

function showMovies(data) {
    data.forEach(movie => {
        // získame tieto informácie z fore cyklu a vyhľadávame ich podla názvu v json
        const {title, poster_path, name } = movie;
        //filmi a serialy majú rôzne označenie názvu tak toto to rieši
        if (typeof title ==="undefined") {
            nazov = name;
        } else {
            nazov = title;
        }
        const movieElement = document.getElementById("sugestedMoviesSerials");
        movieElement.innerHTML += `<div class="col-md-2 border rounded-4 m-1 ">\n` +
                                `        <a href="?c=movie&a=title">\n` +
                                `            <img class="image w-100 rounded-4 mt-3" src="${IMG_URL+poster_path}" alt="${nazov}">\n` +
                                `        </a>\n` +
                                `        <div class="nazov text-center text-white">\n` +
                                `            ${nazov}\n` +
                                `        </div>\n` +
                                `    </div> `;
    })
}
