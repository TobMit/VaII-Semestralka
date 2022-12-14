<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use App\Models\Users;

/**
 * Class DummyAuthenticator
 * Basic implementation of user authentication
 * @package App\Auth
 */
class Authenticator implements IAuthenticator
{
    const LOGIN = "admin";
    const PASSWORD_HASH = '$2y$10$GRA8D27bvZZw8b85CAwRee9NH5nj4CQA6PDFMc90pN9Wi4VAWq3yq'; // admin
    const USERNAME = "Admin";

    /**
     * DummyAuthenticator constructor
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */
    function login($login, $password): bool
    {
        $testUser = Users::getOne($login);
        if ($testUser === null) {
            return false;
        }
        if ($login == $testUser->getUsername() && password_verify($password, $testUser->getPassword())) {
            $_SESSION['user'] = $login;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Logout the user
     */
    function logout() : void
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            session_destroy();
        }
    }

    /**
     * Get the name of the logged-in user
     * @return string
     */
    function getLoggedUserName(): string
    {

        return isset($_SESSION['user']) ? $_SESSION['user'] : throw new \Exception("User not logged in");
    }

    /**
     * Get the context of the logged-in user
     * @return string
     */
    function getLoggedUserContext(): mixed
    {
        return null;
    }

    /**
     * Return if the user is authenticated or not
     * @return bool
     */
    function isLogged(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }

    /**
     * Return the id of the logged-in user
     * @return mixed
     */
    function getLoggedUserId(): mixed
    {
        return $_SESSION['user'];
    }

    function register($username, $email, $password) :bool {
        $existingUser = Users::getOne($username);
        if ($existingUser !== null) {
            return false;
        }

        $tmpUser = new Users();
        $tmpUser->setEmail($email);
        $tmpUser->setId($username);
        $tmpUser->setPassword($this->generateHash($password));
        $tmpUser->create();
        return true;
    }

    function generateHash($password): string {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}