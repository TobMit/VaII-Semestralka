<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\IPageDetector $pageDetecgor */
/** @var Array $data */
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>DatabazaFilmov</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/public/css/styl.css">

        <script type="text/javascript" src="/public/js/config.js"></script>
        <script type="text/javascript" src="/public/js/script.js"></script>
    </head>
    <body class="d-flex flex-column h-100">
        <header class="navbar navbar-expand-lg p-3 navbar-color fixed-top" aria-label="NavBAr">
            <div class="container-fluid container-md">
                <a href="?c=home" class="mx-auto"> <!-- class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none" -->
                    <img src="https://static.wixstatic.com/media/2cd43b_1b726a2e5fd8486f9004db29808ab090~mv2.png/v1/fill/w_192,h_192,q_90/2cd43b_1b726a2e5fd8486f9004db29808ab090~mv2.png" alt="DatabazaFilmov" width="40" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsMain" aria-controls="navbarsMain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsMain">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" id="menu">
                        <li><a href="?c=home" class="nav-link px-2 <?php if ($pageDetecgor->getPageId() == 1) { ?> text-white <?php } ?> ">Home</a></li>
                        <li><a href="?c=movie&a=films" class="nav-link px-2 <?php if ($pageDetecgor->getPageId() == 2) { ?> text-white <?php } ?> ">Films</a></li>
                        <li><a href="?c=movie&a=serials" class="nav-link px-2 <?php if ($pageDetecgor->getPageId() == 3) { ?> text-white <?php } ?> ">Serials</a></li>
                        <li><a href="?c=home&a=about" class="nav-link px-2 <?php if ($pageDetecgor->getPageId() == 4) { ?> text-white <?php } ?> ">About</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-flex" role="search">
                        <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                    </form>

                    <?php if (!$auth->isLogged()) { ?>
                        <div class="text-end">
                            <button type="button" class="btn btn-outline-danger me-2 text-white" data-bs-target="#loginModal" data-bs-toggle="modal">Login</button>
                            <button type="button" class="btn btn-success" data-bs-target="#singUpModal" data-bs-toggle="modal">Sign-up</button>
                        </div>
                    <?php } else { ?>
                        <div class="dropdown">
                            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://www.clipartmax.com/png/middle/15-153139_big-image-login-icon-with-transparent-background.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu ropdown-menu-end text-small shadow">
                                <li><a class="dropdown-item text-white" href="?c=user">Profile</a></li>
                                <li><a class="dropdown-item text-white" href="?c=user&a=email">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-white" href="?c=auth&a=logout">Log out</a></li>
                            </ul>
                        </div>
                    <?php }?>
                </div>
            </div>

        </header>

        <div class="modal fade" id="singUpModal" tabindex="-1" aria-labelledby="singUpModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                        <h1 class="fw-bold mb-0 fs-2 text-white">Sign up for free</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-5 pt-0">
                        <form class="">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3 text-bg-dark" id="floatingInputUserName" placeholder="text">
                                <label class="text-white" for="floatingInputUserName">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control rounded-3 text-bg-dark" id="floatingInput" placeholder="name@example.com">
                                <label class="text-white" for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-3 text-bg-dark" id="floatingPassword" placeholder="Password">
                                <label class="text-white" for="floatingPassword">Password</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-danger" type="submit">Sign up</button>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                        <h1 class="fw-bold mb-0 fs-2 text-white">Login</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body p-5 pt-0">
                        <form class="form-sign" method="post" action="<?= \App\Config\Configuration::LOGIN_URL ?>">
                            <div class="form-floating mb-3">
<!--                                <input type="email" class="form-control rounded-3 text-bg-dark " id="floatingInputLogin" placeholder="name@example.com">-->
                                <input name="login" type="text" class="form-control rounded-3 text-bg-dark " id="login" placeholder="name@example.com">
                                <label class="text-white" for="login">Email address or user name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="password" type="password" class="form-control rounded-3 text-bg-dark" id="password" placeholder="Password">
                                <label class="text-white" for="password">Password</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-danger" type="submit" name="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <main class="container text-white mb-4" id="stranka-Body">
            <?= $contentHTML ?>

        </main>

        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-auto border-top border-danger mb-0">
            <p class="col-md-4 mb-0 text-muted">&copy; 2022 DatabazaFilmov</p>

            <a href="?c=home" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img src="https://static.wixstatic.com/media/2cd43b_1b726a2e5fd8486f9004db29808ab090~mv2.png/v1/fill/w_192,h_192,q_90/2cd43b_1b726a2e5fd8486f9004db29808ab090~mv2.png" alt="DatabazaFilmov" width="40" height="40">
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="?c=home" class="nav-link px-2 <?php if ($pageDetecgor->getPageId() == 1) { ?> text-white <?php } ?> ">Home</a></li>
                <li class="nav-item"><a href="?c=movie&a=films" class="nav-link px-2 <?php if ($pageDetecgor->getPageId() == 2) { ?> text-white <?php } ?> ">Films</a></li>
                <li class="nav-item"><a href="?c=movie&a=serials" class="nav-link px-2 <?php if ($pageDetecgor->getPageId() == 3) { ?> text-white <?php } ?> ">Serial</a></li>
                <li class="nav-item"><a href="?c=home&a=about" class="nav-link px-2 <?php if ($pageDetecgor->getPageId() == 4) { ?> text-white <?php } ?> ">About</a></li>
            </ul>
        </footer>
    </body>
</html>
