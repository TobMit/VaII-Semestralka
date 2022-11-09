<?php /** @var Array $data */
/** @var \App\Core\IAuthenticator $auth  */
$layout = 'root';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div>
                Toto je len test
            </div>
            <?php if ($auth->isLogged()) { ?>
                <div>
                    Ha toto môžu videiť iba prihlásený
                </div>

            <?php } ?>
        </div>
    </div>
</div>