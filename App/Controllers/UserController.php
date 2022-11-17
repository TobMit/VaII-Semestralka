<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Users;
use mysql_xdevapi\Exception;

class UserController extends AControllerBase
{
    public function authorize($action)
    {
        return $this->app->getAuth()->isLogged();
    }

    public function index(): Response
    {
        return $this->html();
    }

    public function email() : Response
    {
        return $this->html();
    }
    public function password() : Response
    {
        return $this->html();
    }
    public function collection() : Response
    {
        return $this->html();
    }

    public function changeemail() :Response
    {
        $data = [];
        $formData = $this->app->getRequest()->getPost();
        $editUser = Users::getOne($this->app->getAuth()->getLoggedUserName());
        if (!filter_var($formData['newEmail'], FILTER_VALIDATE_EMAIL)){
            $data = ['message' => 'Bad new email addres.'];
            return $this->html($data,"email");
        }
        if ($formData["oldEmail"] == $editUser->getEmail()) {
            $editUser->setEmail($formData["newEmail"]);
            $editUser->save();
            $data = ['message' => 'Changes saved!'];
        } else {
            $data = ['message' => 'Bad email'];
        }
        //$this->redirect("?c=home");
        return $this->html($data, "email");
    }

    public function changepassword() :Response
    {
        $data = [];
        $formData = $this->app->getRequest()->getPost();
        $editUser = Users::getOne($this->app->getAuth()->getLoggedUserName());
        if (!preg_match(Configuration::REGEX_PASSWORD, $formData['newPassword'])){
            $data = ['message' => 'Bad Password. Password must have at least 8 characters, one Upper characer and one special character [@#$%^&*-_]'];
            return $this->html($data, "password");
        }
        if (password_verify($formData["oldPassword"], $editUser->getPassword())) {
            $editUser->setPassword( $this->app->getAuth()->generateHash($formData["newPassword"]));
            $editUser->save();
            $data = ['message' => 'Changes saved!'];
        } else {
            $data = ['message' => 'Bad password'];
        }
        //$this->redirect("?c=user&a=password");
        return $this->html($data, "password");
    }
}