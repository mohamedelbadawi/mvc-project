<?php

namespace app\controllers;

use app\core\controller;
use app\core\DB;
use app\models\User;

class userController extends controller
{

    public function index()
    {
        $user = new User();
        // $user->updateUser(['id'=>1,'name'=>'badawi']);

        $this->view("home", ['name' => "Mohamed"]);
    }
    public function update()
    {
        $db = new DB();
        $db->update("users", ['id' => 1, 'name' => 'Ahmed', 'email' => 'mohamed@gmail.com', 'password' => '10101010']);
    }
    public function delete()
    {
        $db = new DB();
        print_r($db->select("users", ['id' => 2]));
    }
}
