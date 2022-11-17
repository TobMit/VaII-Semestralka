<script>
    getMovies(BASE_URL+POP_MOVIE+API_KEY_URL, null)
    getMovies(BASE_URL+POP_MOVIE+API_KEY_URL+"&page=2", null)
</script>
<div id="carouselMain" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner rounded-2">
        <div class="carousel-item active" data-bs-interval="10000" >
            <img src="https://i0.wp.com/www.eastmojo.com/wp-content/uploads/2022/05/Untitled-design-8-2.png?resize=1200%2C675&ssl=1" class="d-block w-100 opacity-25" alt="Memory 2022">
            <div class="row justify-content-evenly carousel-caption align-items-center">
                <div class="col-6 ">
                    <h1>Memory 2022</h1>
                    <p>An assassin-for-hire finds that he's become a target after he refuses to complete a job for a dangerous criminal organization.</p>
                </div>
                <div class="col-4">
                    <img class="d-flex w-100" src="https://m.media-amazon.com/images/M/MV5BOGNmM2IyMjMtNmU0MC00MzdhLWFlNWYtOTlkZDdiOGEwMTE3XkEyXkFqcGdeQXVyMTA3MDk2NDg2._V1_.jpg" alt="Memory2022 plagat">
                </div>
            </div>

        </div>
        <div class="carousel-item" data-bs-interval="10000">
            <img src="https://m.media-amazon.com/images/M/MV5BOGYzYWE3YTAtMjg2Ni00MzRkLWEwYWItOWM1MjI3YzhjYTYyXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg" class="d-block w-100 opacity-25" alt="Luck 2022">
            <div class="row justify-content-evenly carousel-caption align-items-center">
                <div class="col-6 ">
                    <h1>Luck 2022</h1>
                    <p>The curtain is pulled back on the millennia-old battle between the organizations of good luck and bad luck that secretly affects everyday lives.</p>
                </div>
                <div class="col-4">
                    <img class="d-flex w-100" src="https://m.media-amazon.com/images/M/MV5BNzhlNTAyY2YtNWUyYi00YmE3LWE2OTctZDI2MmJkNmZiMmY0XkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg" alt="Luck2022 plagat">
                </div>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
            <img src="https://www.joblo.com/wp-content/uploads/2022/02/the-lord-of-the-rings-the-rings-of-power-posters.jpg" class="d-block w-100 opacity-25" alt="The Rings of Power 2022">
            <div class="row justify-content-evenly carousel-caption align-items-center">
                <div class="col-6 ">
                    <h1>The Rings of Power 2022</h1>
                    <p>Epic drama set thousands of years before the events of J.R.R. Tolkien's 'The Hobbit' and 'The Lord of the Rings'.</p>
                </div>
                <div class="col-4">
                    <img class="d-flex w-100" src="https://m.media-amazon.com/images/M/MV5BMmVlODAyNTAtODc3Yi00MjFhLTk5MTktNWIwOTUzY2M2ZDc5XkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_FMjpg_UX1000_.jpg" alt="The Rings of Power plagat">
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselMain" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselMain" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container mt-3 mb-1 pt-3 pb-3 rounded-2 mineHeader">
    <div class="border-danger border-bottom">
        <h1>Suggestion</h1>
    </div>
</div>
<div class="row justify-content-evenly" id="sugestedMoviesSerials">
<!--
    <div class="col-md-2 border rounded-4 m-1 ">
        <a href="?c=movie&a=title">
            <img class="image w-100 rounded-4 mt-3" src="https://m.media-amazon.com/images/M/MV5BMmVlODAyNTAtODc3Yi00MjFhLTk5MTktNWIwOTUzY2M2ZDc5XkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_FMjpg_UX1000_.jpg" alt="The Rings of Power plagat">
        </a>
        <div class="nazov text-center text-white">
            The Rings of Power
        </div>
    </div>
    <div class="col-md-2 border rounded-4 m-1 ">
        <a href="?c=movie&a=title">
            <img class=" w-100 rounded-4 mt-3" src="https://m.media-amazon.com/images/M/MV5BNzhlNTAyY2YtNWUyYi00YmE3LWE2OTctZDI2MmJkNmZiMmY0XkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg" alt="Luck plagat">
        </a>
        <div class="nazov text-center ">
            Luck
        </div>
    </div>
    <div class="col-md-2 border rounded-4 m-1 ">
        <a href="?c=movie&a=title">
            <img class="image w-100 rounded-4 mt-3" src="https://m.media-amazon.com/images/M/MV5BOGNmM2IyMjMtNmU0MC00MzdhLWFlNWYtOTlkZDdiOGEwMTE3XkEyXkFqcGdeQXVyMTA3MDk2NDg2._V1_.jpg" alt="Memory plagat">
        </a>
        <div class="nazov text-center ">
            Memory
        </div>
    </div>
    -->


</div>
