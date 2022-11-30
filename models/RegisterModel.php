<?php

namespace app\models;

use app\core\Model;

class RegisterModel extends Model
{

    public string $firstName;
    public string $lastName;
    public string $email;
    public string $password;
    public string $passwordConfirm;
    public function __construct()
    {

    }

    public function register()
    {
        return "creating Account";
    }
}