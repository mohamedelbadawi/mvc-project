<?php

namespace app\core;

class App
{
    private $controller;
    private $method;
    private $params = [];

    public function __construct()
    {
        $this->url();
        $this->render();
    }
    private function url()
    {

        if (!empty($_SERVER['QUERY_STRING'])) {

            $url = explode("/", $_SERVER['QUERY_STRING']);
            // controller
            $this->controller = isset($url[0]) ? $url[0] : 'home';
            // method
            $this->method = isset($url[1]) ? $url[1] : 'index';
            // param of the url
            $this->params = isset($url[2]) ? $url[2] : [];
        }
    }

    private function render()
    {
        $this->controller = "app\\controllers\\". $this->controller . "Controller";
        if (class_exists($this->controller)) {
            $controllerObj = new $this->controller;
            if (method_exists($controllerObj, $this->method)) {
                call_user_func_array([$controllerObj, $this->method], $this->params);
            }
        }
    }
}
