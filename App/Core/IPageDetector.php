<?php

namespace App\Core;
/**
 * Interface IPageDetector
 * Interface for detecting page in layout
 * @package App\Core
 */

interface IPageDetector
{
    /**
     * Set actual viewed page
     * @param $pageId
     * @return void
     */
    function setActualPage($pageId) : void;

    /**
     * Return id of page
     * @return int
     */
    function getPageId(): int;
}