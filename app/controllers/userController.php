<?php

namespace app\controllers;

use app\core\controller;
use app\core\DB;

class userController extends controller
{

    public function index()
    {
        $db = new DB();
        $db->insert("users", ['name' => 'Mohamed', 'email' => 'mohamed@gmail.com', 'password' => '10101010']);
        $this->view("home");
    }
    public function update()
    {
        $db = new DB();
        $db->update("users", ['id' => 1, 'name' => 'Ahmed', 'email' => 'mohamed@gmail.com', 'password' => '10101010']);
    }
    public function delete()
    {
        $db = new DB();
        print_r($db->select("users",['id'=>2]));
    }
}
