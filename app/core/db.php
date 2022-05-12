<?php

namespace app\core;

use app\core\dbhandler;
use PDO;

class DB implements dbhandler
{
    private $dsn = "mysql:host=localhost;dbname=mvc";
    protected $connection;

    public function __construct()
    {
        $this->connection = new PDO($this->dsn, "root", "");
    }

    public function insert($table, $data)
    {
        $sql = "INSERT INTO `$table` (";
        foreach ($data as $key => $value) {
            $sql .= "`$key` ,";
        }
        $sql = rtrim($sql, ",");
        $sql .= ") VALUES (";

        foreach ($data as $key => $value) {
            $sql .= ":$key ,";
        }
        $sql = rtrim($sql, ",");
        $sql .= ")";
        // echo $sql;
        // die;
        $stm = $this->connection->prepare($sql);
        $stm->execute($data);
    }
    public function update($table, $data)
    {
        $sql = "update `$table` SET ";
        foreach ($data as $key => $value) {
            if ($key != 'id') {
                $sql .= "`$key` = :$key ,";
            }
        }
        $sql = rtrim($sql, ",");

        foreach ($data as $key => $value) {
            if ($key == 'id') {
                $sql .= "WHERE `$key` = :$key";
            }
        }
        $this->exec($data, $sql);
    }
    public function delete($table, $id)
    {
        $sql = "delete from `$table` where `id` = :id";
        $data = ['id' => $id];
        $this->exec($data, $sql);
    }
    public function selectAll($table)
    {
        $sql = "SELECT * FROM `$table`";

        $stm = $this->connection->query($sql);
        return   $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select($table, $data)
    {
        $sql = "SELECT * FROM `$table` Where `id`=" . $data['id'];

        $stm = $this->connection->query($sql);
        return   $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sqlQuery($sql,$data='')
    {
        $stm = $this->connection->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function exec($data, $sql)
    {
        $stm = $this->connection->prepare($sql);

        $stm->execute($data);
    }
}
