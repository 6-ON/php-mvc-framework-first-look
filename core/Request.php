<?php

namespace app\core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER["REQUEST_URI"];
        $position = strpos($path, '?');
        if ($position===false){
            return $path;
        }
        return $position ;
    }
    public function getMethod(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }


}