<?php

namespace App\Models;

class Comments extends \App\Core\Model
{
    protected $id;
    protected $users;
    protected $text;
    protected $typMovie;

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
    protected $idMovie;

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
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users): void
    {
        $this->users = $users;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }
}