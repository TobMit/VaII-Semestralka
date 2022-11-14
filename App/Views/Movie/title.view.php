<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
?>
<script> findMovieById("<?php echo $data[0]?>", "<?php echo $data[1]?>" ) </script>
<div class="container mt-3 mb-1 pt-3 pb-3 rounded-2 mineHeader">
    <div class="row  border-danger border-bottom pb-3 m-1">
        <div class="posterImage col-md-4">
            <img class="posterImage col-md-4 rounded-4" src="https://i.pinimg.com/736x/b5/29/59/b529593714de128db1370a158793a7a6.jpg" alt="Template plagat">
        </div>
        <div class="col-lg-4 popis">
            <h1>Tile of movie/serial</h1>
            <p class="text-secondary">Release: ....</p>
            <h4>Category|Category|category</h4>
            <p>Druation: ...</p>
            <h5>Actors: ...</h5>
            <?php if ($auth->isLogged()) { ?>
                <div class="d-grid  col-8">
                    <button type="button" class="btn  btn-outline-danger me-2 text-white"  data-bs-target="#loginModal" data-bs-toggle="Wath">Seen</button>
                </div>
            <?php }?>
        </div>
    </div>

</div>
<div class="container mt-3 mb-1 pt-3 pb-3 rounded-2 mineHeader">
    <div class=" border-danger border-bottom">
        <h1 class="text-start" >Plot</h1>
    </div>
    <div >
        <p class="fs-5">Te consectetur luptatum magna sagittis tation persius labores laudem mnesarchum. Augue adipiscing dolorum inani sententiae. Litora natum consequat sumo noluisse voluptatibus petentium utinam hinc. Vel duis vocent signiferumque te. Utamur aliquip tation saperet explicari repudiandae inciderint scripserit. Theophrastus dicta iaculis feugait adipisci.</p>
    </div>
</div>

<div class="container mt-3 mb-1 pt-3 pb-3 rounded-2 mineHeader">
    <div class=" border-danger border-bottom">
        <h1 class="text-start" >Director</h1>
    </div>
    <div >
        <p class="fs-5">Some name....</p>
    </div>
</div>

<div class="container mt-3 mb-1 pt-3 pb-3 rounded-2 mineHeader">
    <div class=" border-danger border-bottom">
        <h1 class="text-start" >Writers</h1>
    </div>
    <div >
        <p class="fs-5">Amina Gibson Mrs. Marcelino Heaney Mrs. Irmgard Kulas</p>
    </div>
</div>
