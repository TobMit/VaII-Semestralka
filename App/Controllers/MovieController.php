<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\Responses\Response;
use App\Core\AControllerBase;
use App\Models\Wllists;

class MovieController extends AControllerBase
{
    public function authorize($action)
    {
        switch ($action) {
            case "index":
            case "films":
            case "serials":
            case "title":
            case "search":
                return true;
            default:
                return $this->app->getAuth()->isLogged();
        }
    }

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
        $tmpArray = array($this->request()->getValue('id'), $this->request()->getValue('type'),0);
        if ($this->app->getAuth()->isLogged()) {
            $tmpWatched = Wllists::getAll("username = ? and typ = ? and idMovie = ? and typMovie = ?", [$this->app->getAuth()->getLoggedUserName(), 'w', $this->request()->getValue('id'), $this->request()->getValue('type')]);
            $watched = 0;
            if (count($tmpWatched) !== 0) {
                $watched = 1;
            }
            $tmpArray[2] = $watched;
        }
        return $this->html($tmpArray,"title");
    }


    public function search() :Response
    {
        $searchQuery = $this->app->getRequest()->getPost();
        if (!preg_match(Configuration::REGEX_SEARCH, $searchQuery['search'])) {
            return $this->html(array(""));
        }
        $tmpArray = array($searchQuery['search']);
        return $this->html($tmpArray);
    }

    public function watched() :Response {
        $watchedMovie = new Wllists();
        $watchedMovie->setTyp('w');
        $watchedMovie->setUsername($this->app->getAuth()->getLoggedUserName());
        $watchedMovie->setIdMovie($this->request()->getValue('id'));
        $watchedMovie->setTypMovie($this->request()->getValue('type'));
        $watchedMovie->save();
        return $this->redirect("?c=movie&a=title&id=" . $this->request()->getValue('id') . "&type=" . $this->request()->getValue('type'));
    }
    public function watcheddelete() :Response {
        $tmpWatched = Wllists::getAll("username = ? and typ = ? and idMovie = ? and typMovie = ?", [$this->app->getAuth()->getLoggedUserName(), 'w',$this->request()->getValue('id'), $this->request()->getValue('type') ]);
        $tmpWatched[0]->delete();
        return $this->redirect("?c=movie&a=title&id=" . $this->request()->getValue('id') . "&type=" . $this->request()->getValue('type'));
    }
}