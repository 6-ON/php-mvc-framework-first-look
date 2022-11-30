<?php

namespace app\core;
class Router
{
    public array $routes = [];

    public Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path,$callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {

        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            Application::$app->response->setStatusCode(404);
            return $this->renderView('404');
        }
        if (is_string($callback)){
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
        return call_user_func($callback,$this->request);
    }

    public function renderView($view,$params = [])
    {
        $layoutContent = $this->renderLayout();
        $viewContent = $this->renderViewOnly($view,$params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }



    public function renderViewOnly($view,$params = [])
    {
        extract($params);
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }


    protected function renderLayout()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }


}