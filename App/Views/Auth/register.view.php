<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="modal-body p-5 pt-0">
                <div class="text-center text-danger mb-3">
                    <?= @$data['message'] ?>
                </div>
                <form method="post" action="?c=auth&a=register" class="">
                    <div class="form-floating mb-3">
                        <input required pattern="[A-Za-z][A-Za-z0-9]{4,25}" name="username" type="text" class="form-control rounded-3 text-bg-dark" id="floatingInputUserName" placeholder="text">
                        <label class="text-white" for="floatingInputUserName">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input required name="email" type="email" class="form-control rounded-3 text-bg-dark" id="floatingInput" placeholder="name@example.com">
                        <label class="text-white" for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input required pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*-_]{8,}" name="password" type="password" class="form-control rounded-3 text-bg-dark" id="floatingPassword" placeholder="Password">
                        <label class="text-white" for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-danger" type="submit" name="submit">Sign up</button>
                    <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                </form>
                <div class="text-center mt-2">
                    <a class="nav-link" href="?c=home">Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>
