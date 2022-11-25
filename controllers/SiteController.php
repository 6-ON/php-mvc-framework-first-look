<?php

namespace app\controllers;

use app\core\Application;

class SiteController
{
    public function home()
    {
        $p = ['name'=>"amine"];
        return Application::$app->router->renderView('home',$p);
    }

    public function contact()
    {
        return Application::$app->router->renderView('contact');

    }

    public function handlingContact()
    {
        var_dump($_POST);
    }

}