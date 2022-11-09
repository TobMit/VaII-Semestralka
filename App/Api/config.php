<?php

namespace App\Api;


use App\Api\ApiKey;

class Config
{
    public const API_KEY = 'api_key=' . ApiKey::API_KEY; //sem zadať vlastný kľúč
    public const BASE_URL = 'https://api.themoviedb.org/3';
    public const IMG_URL = 'https://image.tmdb.org/t/p/w500';
    public const TRENDING_MOVIE = '/trending/movie/week?';
    public const TRENDING_TV = '/trending/tv/week?';
}