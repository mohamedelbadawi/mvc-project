<?php

namespace app\models;

use app\core\DB;
use app\models\Model;

class User extends DB
{
    public $table = "users";

    public function createUser($data)
    {
        $this->insert($this->table, $data);
    }
    public function All()
    {
        return  $this->selectAll($this->table);
    }
    public function get($id)
    {
        $data['id'] = $id;
        return $this->select($this->table, $data);
    }
    public function updateUser($data)
    {
        $this->update($this->table, $data);
    }
}
