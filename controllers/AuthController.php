<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isPost()) {
            return "Handling Login";
        }
        $this->setLayout('Auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());
            echo "<pre>";
            var_dump($registerModel);
            echo "</pre>";
            exit();
            if ($registerModel->validate() && $registerModel->register()) {
                return "handling Register";
            }
            return "Error to register";

        }
        $this->setLayout('Auth');
        return $this->render('register');
    }
}