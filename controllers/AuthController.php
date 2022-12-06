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
        $this->setLayout('Auth');
        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->register()) {
                return "success";
            }
            return $this->render('register', [
                'model' => $registerModel
            ]);

        }
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}