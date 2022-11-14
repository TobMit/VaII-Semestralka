// TMDB

// TODO Pre uplnú funkčnosť treba vytvoriť ešte js file s nazvom config kde uložíme pomocou premennej uložíme vlastný API_KEY

const API_KEY_URL = 'api_key=' + API_KEY;
const BASE_URL = 'https://api.themoviedb.org/3';
const POP_MOVIE = '/trending/all/week?';
const POP_FILM = '/trending/movie/week?';
const POP_SERIAL = '/trending/tv/week?';
const FILM_URL = '/movie/'
const SERIAL_URL = '/tv/'
const IMG_URL = 'https://image.tmdb.org/t/p/w500';
// BASE_REQUEST = BASE_URL + "request" + API_KEY

//getMovies(BASE_URL+POP_MOVIE+API_KEY_URL);

function getMovies(url) {
    //zíkame url request, response uložime do res.json a potom prístpime k dátam
    fetch(url).then(res => {
        //console.log(res);
        const {status, ok} = res;
        // kontrolujem či je response v pohode
        if (status === 200 && ok) {
            res.json().then(data =>{
                //console.log(data);

                //aby sme nemuseli parsovať všetko iba result object
                showMovies(data.results);
            });
        } else {
            alert("We run into problem, try later!");
        }
    });
}

function showMovies(data) {
    data.forEach(movie => {
        // získame tieto informácie z fore cyklu a vyhľadávame ich podla názvu v json
        const {title, poster_path, name, id, media_type } = movie;
        //filmi a serialy majú rôzne označenie názvu tak toto to rieši
        if (typeof title ==="undefined") {
            nazov = name;
        } else {
            nazov = title;
        }
        const movieElement = document.getElementById("sugestedMoviesSerials");
        movieElement.innerHTML += `<div class="col-md-2 border rounded-4 m-1 ">\n` +
                                `        <a href="?c=movie&a=title&id=${id}&type=${media_type}">\n` +
                                `            <img class="image w-100 rounded-4 mt-3" src="${IMG_URL+poster_path}" alt="${nazov}">\n` +
                                `        </a>\n` +
                                `        <div class="nazov text-center text-white">\n` +
                                `            ${nazov}\n` +
                                `        </div>\n` +
                                `    </div> `;
    })
}

/**
 * @param {string} id is ide of movie
 * @param {string} type is type of movie: movie for films and tv for serials
 */
function findMovieById(id, type) {
    if (type === "movie") {
        url = BASE_URL + FILM_URL + id + "?" + API_KEY_URL;
    } else {
        url = BASE_URL + SERIAL_URL + id + "?" + API_KEY_URL;
    }
    fetch(url).then(res => {
        const {status, ok} = res;
        if (status === 200 && ok) {
            res.json().then(data =>{
                //console.log(data);
                if (type === "movie") {
                    showFilmInfo(data);
                } else {
                    showSerialInfo(data, id);
                }
            });
        } else {
            alert("We run into problem, try later!");
        }
    });
}

function showSerialInfo(data, id) {
    console.log(data);
    const {overview, poster_path, name, number_of_seasons, number_of_episodes,first_air_date, genres } = data;

    const posterElement = document.getElementById("moviePoster");
    posterElement.innerHTML += `<img class="posterImage col-md-4 rounded-4" src="${IMG_URL+poster_path}" alt="${name}">`;

    const movieNameElement = document.getElementById("movieName");
    movieNameElement.innerHTML += `${name}`;

    const releaseElement = document.getElementById("release");
    releaseElement.innerHTML += `${first_air_date}`;

    const categoryElement = document.getElementById("category");
    let first = true;
    for (const genre of genres) {
        if (first) {
            first = false;
            categoryElement.innerHTML += `${genre.name}`;
        } else {
            categoryElement.innerHTML += ` | ${genre.name}`;
        }

    }

    const aditionalInformationElement = document.getElementById("aditionalInformation");
    aditionalInformationElement.innerHTML += `<h5>Number of Season: ${number_of_seasons} </h5> \n` +
                                            `<p>Number of episodes: ${number_of_episodes}</p>`;

    const overviewElement = document.getElementById("overview");
    overviewElement.innerHTML += `${overview}`;

    getMovies(BASE_URL + SERIAL_URL + id + "/similar?" + API_KEY_URL);
}
