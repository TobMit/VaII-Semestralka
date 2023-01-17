<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-header p-5 pb-4 border-bottom-0">
                    <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                    <h1 class="fw-bold mb-0 fs-2 text-white">Login</h1>

                </div>
                <div class="card-body p-5 pt-0">
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-sign" method="post" action="<?= \App\Config\Configuration::LOGIN_URL ?>">
                        <div class="form-floating mb-3">
                            <input required pattern="[A-Za-z][A-Za-z0-9]{4,25}" name="username" type="text" class="form-control rounded-3 text-bg-dark " id="login" placeholder="name@example.com">
                            <label class="text-white" for="login">User name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input required pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*-_]{8,}" name="password" type="password" class="form-control rounded-3 text-bg-dark" id="password" placeholder="Password">
                            <label class="text-white" for="password">Password</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-danger" type="submit" name="submit">Login</button>
                        <div class="text-center mt-2">
                            <a class="nav-link" href="?c=home">Go back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
