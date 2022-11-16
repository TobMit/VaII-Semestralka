<?php
/** @var Array $data */
?>
<script>
    searchMovie("<?php echo $data[0]?>");
</script>
<div class="container mt-3 mb-1 pt-3 pb-3 rounded-2 mineHeader">
    <div class="border-danger border-bottom">
        <h1>Results for: <?php echo $data[0]?></h1>
        <form method="post" action="?c=movie&a=search" class="col-auto d-flex mb-2">
            <input name="search" type="search" class="form-control form-control-dark text-bg-dark me-2"  placeholder="Search..." id="searchInputBig">
            <label class="text-white" for="searchInputBig"></label>
            <button class="btn btn-danger ms-2 col-md-3" type="submit">Search</button>
        </form>
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
