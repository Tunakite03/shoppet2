<?php

class SearchModel
{
    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }
    
    public function getListSearch($table,$key)
    {
           try {
            $query = "SELECT * FROM `$table` WHERE `name` LIKE  '%$key%' ";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
}
