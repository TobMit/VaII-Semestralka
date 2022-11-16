<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class UserController extends AControllerBase
{
    public function authorize($action)
    {
        return $this->app->getAuth()->isLogged();
    }

    public function index(): Response
    {
        return $this->html();
    }

    public function email() : Response
    {
        return $this->html();
    }
    public function password() : Response
    {
        return $this->html();
    }
    public function collection() : Response
    {
        return $this->html();
    }
}