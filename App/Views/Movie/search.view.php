<?php
/** @var Array $data */
?>
<script>
    movieDB.searchMovie("<?php echo $data[0]?>");
</script>
<div class="container mt-3 mb-1 pt-3 pb-3 rounded-2 mineHeader">
    <div class="border-danger border-bottom">
        <h1>Results for: <?php echo $data[0]?></h1>
        <form method="post" action="?c=movie&a=search" class="col-auto d-flex mb-2">
            <input name="search" pattern="[A-Za-z0-9\s?!.,:]{1,}" type="search" class="form-control form-control-dark text-bg-dark me-2"  placeholder="Search..." id="searchInputBig">
            <label class="text-white" for="searchInputBig"></label>
            <button class="btn btn-danger ms-2 col-md-3" type="submit">Search</button>
        </form>
    </div>
</div>
<div class="row justify-content-evenly" id="sugestedMoviesSerials">


</div>
