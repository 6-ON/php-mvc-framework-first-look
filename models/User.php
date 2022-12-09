<?php

namespace app\models;

use app\core\DbModel;
use app\core\Model;

class User extends DbModel
{

    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';


    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 32]],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]

        ];
    }

    public function tableName(): string
    {
        return 'user';
    }

    public function attributes(): array
    {
        return ['firstName' => 'f_name',
            'lastName' => 'l_name',
            'email' => 'email',
            'password' => 'pswd'];
    }

    public function labels(): array
    {
        return ['firstName' => 'First Name',
            'lastName' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => ' Confirm Password'
        ];
    }
}