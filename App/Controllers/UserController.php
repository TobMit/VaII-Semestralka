<?php

namespace App\Controllers;

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