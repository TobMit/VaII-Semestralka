<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\Core\AControllerBase;

class MovieController extends AControllerBase
{

    /**
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect("?c=movie&a=films");
        //return $this->html();
    }

    public function films(): Response
    {
        $pageId = $this->app->getPageDetecotr();
        $pageId->setActualPage(2);
        return $this->html();
    }
}