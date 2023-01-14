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
    <div class=" border-danger border-bottom mb-1">
        <h1 class="text-start" >Comments</h1>
    </div>
    <div class="row justify-content-evenly">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11 col-lg-9 col-xl-7">
                <div>
                    <div class="d-flex flex-start mb-3">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="">
                                    <h5>Johny Cash</h5>
                                    <p>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                        ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus
                                        viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                                        Donec lacinia congue felis in faucibus ras purus odio, vestibulum in
                                        vulputate at, tempus viverra turpis.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-start mb-3">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="">
                                    <h5>Mindy Campbell</h5>
                                    <p>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus
                                        cumque doloribus dolorum dolor repellat nemo animi at iure autem fuga
                                        cupiditate architecto ut quam provident neque, inventore nisi eos quas?
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- TODO iba pre prihlásených -->
                <div class="d-flex flex-start">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <div class="d-flex flex-start w-100">
                                <div class="w-100">
                                    <div class="form-outline">
                                        <h5 class="text-white">
                                            <label class="form-label" for="textAreaExample">Add a comment</label>
                                        </h5>
                                        <textarea class="form-control text-bg-dark" id="textAreaExample" rows="4" placeholder="What is your view?"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="button" class="btn btn-danger">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<div class="container mt-3 mb-1 pt-3 pb-3 rounded-2 mineHeader">
    <div class=" border-danger border-bottom">
        <h1 class="text-start" >You may also like</h1>
    </div>
    <div class="row justify-content-evenly" id="sugestedMoviesSerials">

    </div>
</div>

