<?php

namespace app\core;

class Controller
{
    public function view($path, $data = null)
    {
        extract($data);
        require VIEWS . $path . ".php";
    }
}
