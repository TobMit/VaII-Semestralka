<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            if (!preg_match(Configuration::REGEX_USERNAME, $formData['username'])){
                $data = ['message' => 'Bad Username. Username must have at least 5 characters'];
                return $this->html($data);
            }
            if (!preg_match(Configuration::REGEX_PASSWORD, $formData['password'])){
                $data = ['message' => 'Bad Password. Password must have at least 8 characters, one Upper characer and one special character [@#$%^&*-_]'];
                return $this->html($data);
            }
            $logged = $this->app->getAuth()->login($formData['username'], $formData['password']);
            if ($logged) {
                return $this->redirect('?c=home');
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return \App\Core\Responses\ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect("?c=home");
    }


    /**
     * Register new user
     * @return Response
     */
    public function register() :Response
    {
        $data = [];
        $formDAta = $this->app->getRequest()->getPost();
        $registered = false;
        if (isset($formDAta['submit'])) {

            if (!preg_match(Configuration::REGEX_USERNAME, $formDAta['username'])){
                $data = ['message' => 'Bad Username. Username must have at least 5 characters'];
                return $this->html($data);
            }
            if (!preg_match(Configuration::REGEX_PASSWORD, $formDAta['password'])){
                $data = ['message' => 'Bad Password. Password must have at least 8 characters, one Upper characer and one special character [@#$%^&*-_]'];
                return $this->html($data);
            }
            if (!filter_var($formDAta['email'], FILTER_VALIDATE_EMAIL)){
                $data = ['message' => 'Bad email addres.'];
                return $this->html($data);
            }
            $registered = $this->app->getAuth()->register($formDAta['username'], $formDAta['email'], $formDAta['password']);
        }//if ()
        if ($registered) {
            // potvrdenie
            //return $this->redirect("?c=home");
            return $this->login();
        } else {
            // skúste znovu
            $data = ['message' => 'Bad form data'];
            return $this->html($data);
        }
    }
}