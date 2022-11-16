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
    public function serials(): Response
    {
        $pageId = $this->app->getPageDetecotr();
        $pageId->setActualPage(3);
        return $this->html();
    }
    public function title(): Response
    {
        $pageId = $this->app->getPageDetecotr();
        $pageId->setActualPage(0);
        $tmpArray = array($this->request()->getValue('id'), $this->request()->getValue('type'));
        return $this->html($tmpArray,"title");
    }


    public function search() :Response
    {
        $searchQuery = $this->app->getRequest()->getPost();
        $tmpArray = array($searchQuery['search']);
        return $this->html($tmpArray);
    }
}