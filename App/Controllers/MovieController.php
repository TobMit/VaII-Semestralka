<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\Responses\Response;
use App\Core\AControllerBase;
use App\Models\Comments;
use App\Models\Ratings;
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
            case "getComments":
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
            $tmpLiked = Wllists::getAll("username = ? and typ = ? and idMovie = ? and typMovie = ?", [$this->app->getAuth()->getLoggedUserName(), 'l', $this->request()->getValue('id'), $this->request()->getValue('type')]);
            $liked = 0;
            if (count($tmpLiked) !== 0) {
                $liked = 1;
            }
            $tmpArray[3] = $liked;
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

    public function liked() :Response {
        $watchedMovie = new Wllists();
        $watchedMovie->setTyp('l');
        $watchedMovie->setUsername($this->app->getAuth()->getLoggedUserName());
        $watchedMovie->setIdMovie($this->request()->getValue('id'));
        $watchedMovie->setTypMovie($this->request()->getValue('type'));
        $watchedMovie->save();
        return $this->redirect("?c=movie&a=title&id=" . $this->request()->getValue('id') . "&type=" . $this->request()->getValue('type'));
    }
    public function likedDelete() :Response {
        $tmpWatched = Wllists::getAll("username = ? and typ = ? and idMovie = ? and typMovie = ?", [$this->app->getAuth()->getLoggedUserName(), 'l',$this->request()->getValue('id'), $this->request()->getValue('type') ]);
        $tmpWatched[0]->delete();
        return $this->redirect("?c=movie&a=title&id=" . $this->request()->getValue('id') . "&type=" . $this->request()->getValue('type'));
    }

    public function commentCreate() :Response {
        $tmpCommnet = new Comments();
        $tmpCommnet->setUsers($this->app->getAuth()->getLoggedUserName());
        $tmpCommnet->setText($this->app->getRequest()->getValue("commentText"));
        $tmpCommnet->setIdMovie($this->app->getRequest()->getValue("idMovie"));
        $tmpCommnet->setTypMovie($this->app->getRequest()->getValue("typMovie"));
        $tmpCommnet->create();
        $returnData = array();
        $returnData['isSuccess'] = true;

        return $this->json($returnData);
    }

    public function getComments() :Response {
        $idMovie = $this->app->getRequest()->getValue("idMovie");
        $typMovie=$this->app->getRequest()->getValue("typMovie");
        $returnData = array();
        $returnData['isSuccess'] = true;
        $tmpComments = Comments::getAll("idMovie = ? and typMovie = ?", [$idMovie, $typMovie]);
        $arrayComment = array();
        foreach ($tmpComments as $tmpComment) {
            array_push($arrayComment, array('user' => $tmpComment->getUsers(), 'text' => $tmpComment->getText()));
        }
        $returnData['arrSize'] = count($arrayComment);
        $returnData['results'] = $arrayComment;
        return $this->json($returnData);
    }

    public function getRating() :Response {
        $tmpUserRating = Ratings::getAll("users = ? and idMovie = ? and typMovie = ?", [$this->app->getAuth()->getLoggedUserName(),$this->app->getRequest()->getValue("idMovie"), $this->app->getRequest()->getValue("typMovie")]);
        $averageRating = Ratings::getAll("idMovie = ? and typMovie = ?", [$this->app->getRequest()->getValue("idMovie"), $this->app->getRequest()->getValue("typMovie")]);

        $returnData = array();
        if (count($tmpUserRating)!=0) {
            $returnData['userSelected'] = $tmpUserRating[0]->getRating();
        } else {
            $returnData['userSelected'] = 0;
        }
        $average = 0;
        if (count($averageRating) != 0) {
            foreach ($averageRating as $ratings) {
                $average += $ratings->getRating();
            }
            $returnData['movieAverage'] = $average / count($averageRating);
        } else {
            $returnData['movieAverage'] = 0;
        }
        return $this->json($returnData);
        //return $this->json();
    }

    public function setRating() :Response {
        $tmpUserRating = Ratings::getAll("users = ? and idMovie = ? and typMovie = ?", [$this->app->getAuth()->getLoggedUserName(),$this->app->getRequest()->getValue("idMovie"), $this->app->getRequest()->getValue("typMovie")]);
        if (count($tmpUserRating) != 0) {
            $userRating = $tmpUserRating[0];
            $userRating->setRating($this->app->getRequest()->getValue("userSelected"));
            $userRating->save();
        } else {
            $newUserRating = new Ratings();
            $newUserRating->setUsers($this->app->getAuth()->getLoggedUserName());
            $newUserRating->setRating($this->app->getRequest()->getValue("userSelected"));
            $newUserRating->setIdMovie($this->app->getRequest()->getValue("idMovie"));
            $newUserRating->setTypMovie($this->app->getRequest()->getValue("typMovie"));
            $newUserRating->create();
        }
        return $this->json();
    }
}