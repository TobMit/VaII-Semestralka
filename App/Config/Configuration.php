<?php

namespace App\Config;

use App\Auth\DummyAuthenticator;
use App\Page\PageDetector;
use App\Api\ApiKey;

/**
 * Class Configuration
 * Main configuration for the application
 * @package App\Config
 */
class Configuration
{
    public const APP_NAME = 'Movie Database';
    public const FW_VERSION = '2.0';

    public const DB_HOST = 'localhost';  // change to db, if docker you use docker
    public const DB_NAME = 'MovDB';
    public const DB_USER = 'mov_user'; // change to vaiicko_user, if docker you use docker
    public const DB_PASS = 'db_user_pass';

    public const LOGIN_URL = '?c=auth&a=login';

    public const ROOT_LAYOUT = 'root';

    public const DEBUG_QUERY = false;

    public const AUTH_CLASS = DummyAuthenticator::class;

    public const PAGE_DETECTOR_CLASS = PageDetector::class;
    public const API_KEY = 'api_key=' . ApiKey::API_KEY;
}