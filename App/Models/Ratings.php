<?php

namespace App\Models;

class Ratings extends \App\Core\Model
{
    private $id;
    private $user;
    private $rating;
    private $typMovie;
    private $idMovie;

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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating): void
    {
        $this->rating = $rating;
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
}