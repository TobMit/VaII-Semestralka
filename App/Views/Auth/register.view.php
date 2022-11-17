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
                        <input required name="username" type="text" class="form-control rounded-3 text-bg-dark" id="floatingInputUserName" placeholder="text">
                        <label class="text-white" for="floatingInputUserName">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input required name="email" type="email" class="form-control rounded-3 text-bg-dark" id="floatingInput" placeholder="name@example.com">
                        <label class="text-white" for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input required name="password" type="password" class="form-control rounded-3 text-bg-dark" id="floatingPassword" placeholder="Password">
                        <label class="text-white" for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-danger" type="submit" name="submit">Sign up</button>
                    <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                    <hr class="my-4">
                    <h2 class="fs-5 fw-bold mb-3 text-white">Or use a third-party</h2>
                    <button class="w-100 py-2 mb-2 btn btn-outline-danger rounded-3" type="submit">
                        <img class="me-1" width="20" height="20" src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png" alt="Google">
                        Sign up with Google
                    </button>
                    <button class="w-100 py-2 mb-2 btn btn-outline-light rounded-3" type="submit">
                        <img class="me-1" width="30" height="30" src="https://www.freepnglogos.com/uploads/512x512-logo/512x512-transparent-logo-github-logo-24.png" alt="Google">

                        Sign up with GitHub
                    </button>
                </form>
                <div class="text-center mt-2">
                    <a class="nav-link" href="?c=home">Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>
