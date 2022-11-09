<?php

namespace App\Page;

class PageDetector implements \App\Core\IPageDetector
{
    private $pageIdNumber = 1;


    public function __construct() {
        //session_start();
    }
    /**
     * @inheritDoc
     */
    function setActualPage($pageId): void
    {
        $this->pageIdNumber = $pageId;
    }

    /**
     * @inheritDoc
     */
    function getPageId(): int
    {
        return $this->pageIdNumber;
    }

}