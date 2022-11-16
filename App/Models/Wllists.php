<?php

namespace App\Models;

class Wllists extends \App\Core\Model
{
    protected $id;
    protected $typ;
    protected $username;
    protected $idMovie;
    protected $typMovie;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }


    /**
     * @return mixed
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTyp()
    {
        return $this->typ;
    }

    /**
     * @param mixed $typ
     */
    public function setTyp($typ): void
    {
        $this->typ = $typ;
    }

    /**
     * @return mixed
     */
    public function getIdMovie()
    {
        return $this->idMovie;
    }

    /**
     * @param mixed $idMovie
     */
    public function setIdMovie($idMovie): void
    {
        $this->idMovie = $idMovie;
    }

    /**
     * @return mixed
     */
    public function getTypMovie()
    {
        return $this->typMovie;
    }

    /**
     * @param mixed $typMovie
     */
    public function setTypMovie($typMovie): void
    {
        $this->typMovie = $typMovie;
    }
}