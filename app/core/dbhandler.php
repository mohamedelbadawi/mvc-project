<?php

namespace app\core;

interface dbhandler
{
    public function insert($table, $data);
    public function update($table, $data);
    public function delete($table, $data);
    public function select($table,$data);
    public function selectAll($table);
}
