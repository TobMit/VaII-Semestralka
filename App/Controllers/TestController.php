<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class TestController extends AControllerBase
{

    public function index(): Response
    {
        $pageId = $this->app->getPageDetecotr();
        $pageId->setActualPage(3);
        return $this->html();
    }

}