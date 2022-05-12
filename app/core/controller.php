<?php

namespace app\core;

class Controller
{
    public function view($path)
    {

        require VIEWS . $path . ".php";
    }
}
