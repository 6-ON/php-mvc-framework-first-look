<?php

namespace app\core;


class Application
{
    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public static string $ROOT_DIR;
    public Controller $controller;
    public Database $db;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request);
        $this->db = new Database($config['db']);
    }

    public function run()
    {
        echo $this->router->resolve();

    }


}