<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
?>
<script> movieDB.findMovieById("<?php echo $data[0]?>", "<?php echo $data[1]?>" ) </script>
<div class="container mt-3 mb-1 pt-3 pb-3 rounded-2 mineHeader">
    <div class="row  border-danger border-bottom pb-3 m-1">
        <div class="col-md-4" id="moviePoster">
        </div>
        <div class="col-lg-auto popis">
            <h1 id="movieName"></h1>
            <p class="text-secondary" id="release">Release: </p>
            <h4 id="category"></h4>
            <div id="aditionalInformation">

            </div>
            <?php if ($auth->isLogged()) { ?>
                <div class="d-grid  col-8">
                    <?php if ($data[2] === 0) { ?>
                    <form method="post" action="?c=movie&a=watched&id=<?php echo $data[0] ?>&type=<?php echo $data[1] ?>">
                        <button type="submit" class="btn  btn-outline-danger me-2 text-white"  data-bs-toggle="Wath">Seen</button>
                    </form>
                    <?php } else { ?>
                        <form method="post" action="?c=movie&a=watcheddelete&id=<?php echo $data[0] ?>&type=<?php echo $data[1] ?>">
                            <button type="submit" class="btn  btn-outline-danger me-2 text-white"  data-bs-toggle="Wath">Unseen</button>
                        </form>
                    <?php } ?>
                </div>
            <?php }?>
        </div>
    </div>

</div>
<div class="container mt-3 mb-1 pt-3 pb-3 rounded-2 mineHeader">
    <div class=" border-danger border-bottom">
        <h1 class="text-start" >Overview</h1>
    </div>
    <div >
        <p class="fs-5" id="overview"></p>
    </div>
</div>

<div class="container mt-3 mb-1 pt-3 pb-3 rounded-2 mineHeader">
    <div class=" border-danger border-bottom">
        <h1 class="text-start" >You may also like</h1>
    </div>
    <div class="row justify-content-evenly" id="sugestedMoviesSerials">

    </div>
</div>

