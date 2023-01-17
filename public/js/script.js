// TMDB

//! Pre uplnú funkčnosť treba vytvoriť ešte js file s nazvom config kde uložíme pomocou premennej vlastný API_KEY

const API_KEY_URL = 'api_key=' + API_KEY;
const BASE_URL = 'https://api.themoviedb.org/3';
const POP_MOVIE = '/trending/all/week?';
const POP_FILM = '/trending/movie/week?';
const POP_SERIAL = '/trending/tv/week?';
const FILM_URL = '/movie/'
const SERIAL_URL = '/tv/'
const IMG_URL = 'https://image.tmdb.org/t/p/w500';
const SEARCH_MULTI = '/search/multi?';
// BASE_REQUEST = BASE_URL + "request" + API_KEY

class MovieDB {
    constructor() {
        this.typMovie = "undefined";
        this.idMovie = -1;
        //
    }
    async fetchUrl(url) {
        //zíkame url request, response uložime do res.json a potom prístpime k dátam
        return fetch(url).then(res => {
            //console.log(res);
            const {status, ok} = res;
            // kontrolujem či je response v pohode
            if (status === 200 && ok) {
                return res.json();
            } else {
                alert("We run into problem, try later! GetMovie");
            }
        });
    }

//getMovies(BASE_URL+POP_MOVIE+API_KEY_URL);

    async getMovies(url, type) {
        let res  = await this.fetchUrl(url);
        this.showMovies(res.results, type);
        //console.log(res.results);
    }

    showMovies(data, type) {
        data.forEach(movie => {


            // získame tieto informácie z fore cyklu a vyhľadávame ich podla názvu v json
            const {title, poster_path, name, id, media_type } = movie;
            if (media_type === "movie" || media_type === "tv" || typeof media_type === "undefined") {
                var nazov;
                //filmi a serialy majú rôzne označenie názvu tak toto to rieši
                if (typeof title ==="undefined") {
                    nazov = name;
                } else {
                    nazov = title;
                }
                if (typeof media_type !== "undefined") {
                    type = media_type
                }
                const movieElement = document.getElementById("sugestedMoviesSerials");
                movieElement.innerHTML += `<div class="col-md-2 border rounded-4 m-1 ">\n` +
                    `        <a href="?c=movie&a=title&id=${id}&type=${type}">\n` +
                    `            <img class="image w-100 rounded-4 mt-3" src="${IMG_URL+poster_path}" alt="${nazov}">\n` +
                    `        </a>\n` +
                    `        <div class="nazov text-center text-white">\n` +
                    `            ${nazov}\n` +
                    `        </div>\n` +
                    `    </div> `;
            }
        })
    }

    /**
     * @param {string} id is ide of movie
     * @param {string} type is type of movie: movie for films and tv for serials
     */
    async findMovieById(id, type) {
        var url;
        this.idMovie = id;
        this.typMovie = type;
        if (type === "movie") {
            url = BASE_URL + FILM_URL + id + "?" + API_KEY_URL;
        } else {
            url = BASE_URL + SERIAL_URL + id + "?" + API_KEY_URL;
        }
        let data = await this.fetchUrl(url);

        //console.log(data);
        //spoločné veci sa naloudujú už tu
        const categoryElement = document.getElementById("category");
        let first = true;
        for (const genre of data.genres) {
            if (first) {
                first = false;
                categoryElement.innerHTML += `${genre.name}`;
            } else {
                categoryElement.innerHTML += ` | ${genre.name}`;
            }

        }

        if (type === "movie") {
            this.showFilmInfo(data, id);
        } else {
            this.showSerialInfo(data, id);
        }
    }

    showSerialInfo(data, id) {
        //console.log(data);
        const {overview, poster_path, name, number_of_seasons, number_of_episodes,first_air_date } = data;

        document.getElementById("moviePoster").innerHTML += `<img class="posterImage col-md-4 rounded-4" src="${IMG_URL+poster_path}" alt="${name}">`;
        document.getElementById("movieName").innerHTML += `${name}`;
        document.getElementById("release").innerHTML += `${first_air_date}`;
        const aditionalInformationElement = document.getElementById("aditionalInformation");
        aditionalInformationElement.innerHTML += `<h5>Number of Season: ${number_of_seasons} </h5> \n` +
            `<p>Number of episodes: ${number_of_episodes}</p>`;
        document.getElementById("overview").innerHTML += `${overview}`;

        this.getMovies(BASE_URL + SERIAL_URL + id + "/similar?" + API_KEY_URL, "tv");
    }

    showFilmInfo(data, id) {
        //console.log(data);
        let budgetVypis = "unknown";
        const {overview, poster_path, title, runtime, release_date, budget } = data;
        if (budget !== 0) {
            budgetVypis = budget;
        }
        document.getElementById("moviePoster").innerHTML += `<img class="posterImage col-md-4 rounded-4" src="${IMG_URL+poster_path}" alt="${title}">`;
        document.getElementById("movieName").innerHTML += `${title}`;
        document.getElementById("release").innerHTML += `${release_date}`;
        const aditionalInformationElement = document.getElementById("aditionalInformation");
        aditionalInformationElement.innerHTML += `<h5>Runtime: ${Math.floor(runtime/60)}h ${runtime-(Math.floor(runtime/60)*60)}m </h5> \n` +
            `<p>Buget: ${budgetVypis}</p>`;
        document.getElementById("overview").innerHTML += `${overview}`;

        this.getMovies(BASE_URL + FILM_URL + id + "/similar?" + API_KEY_URL, "movie");
    }


    async searchMovie(searchQuery) {
        let data = await this.fetchUrl(BASE_URL+SEARCH_MULTI+API_KEY_URL+"&query="+searchQuery);
        this.showMovies(data.results, null);
    }

    async getForm() {
        let comment = document.getElementById("textAreaComment").value;
        let data = await fetch("?c=movie&a=commentCreate",
            {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                method: "POST",
                body: "commentText=" + comment + "&idMovie=" + this.idMovie + "&typMovie=" + this.typMovie

            });
        //console.log(data.json());

        let dataJson = await data.json();
        if (!dataJson.isSuccess) {
            alert("Error saving comment");
        }
        this.getComments();
    }
    async getComments() {
        let data = await fetch("?c=movie&a=getComments",
            {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                method: "POST",
                body: "idMovie=" + this.idMovie + "&typMovie=" + this.typMovie

            });
        let dataJson = await data.json();
        //console.log(dataJson);
        if (!dataJson.isSuccess) {
            alert("Error saving comment");
        } else {
            let commentArr = await dataJson.results;
            this.showComments(commentArr, dataJson.arrSize)
        }
    }

    showComments(data, size) {
        let comments = document.getElementById("commentPlace");
        comments.innerHTML="";
        for (let i = 0; i < size; i++) {
            //console.log(data[i]);
            comments.innerHTML +=
                `<div class="d-flex flex-start mb-3">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="">
                                    <h5>${data[i].user}</h5>
                                    <p>
                                        ${data[i].text}
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>`
        }
    }

    ratingHandler() {
        let ratingText = document.getElementById("ratingText");
        let ratingSelelect = document.querySelector("#ratingSelect");
        ratingSelelect.addEventListener('change', () => {
            this.#processRating(ratingText, ratingSelelect, ratingSelelect.options[ratingSelelect.selectedIndex].value);
        });
        this.#showRating(ratingText, ratingSelelect)
    }

    //privatna metoda
    async #processRating(ratingText, ratingSelelect, ratingSelectedValue) {
        await fetch("?c=movie&a=setRating",
            {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                method: "POST",
                body: "userSelected=" + ratingSelectedValue + "&idMovie=" + this.idMovie + "&typMovie=" + this.typMovie

            });

        this.#showRating(ratingText, ratingSelelect);
    }

    async #showRating(ratingText, ratingSelelect) {
        let data = await fetch("?c=movie&a=getRating",
            {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                method: "POST",
                body: "idMovie=" + this.idMovie + "&typMovie=" + this.typMovie

            });
        var jsonData = await data.json();
        console.log(jsonData);
        if (typeof jsonData.movieAverage === "undefined") {
            ratingText.innerText = 'none/5'
        } else {
            ratingText.innerText = jsonData.movieAverage + "/5";
        }
        ratingSelelect.value = jsonData.userSelected;

    }
}
