<?php

namespace app\core;


class Application
{
    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public static string $ROOT_DIR;
    public Controller $controller;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        echo $this->router->resolve();

    }


}