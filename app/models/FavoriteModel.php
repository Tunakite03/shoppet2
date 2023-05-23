<?php

class NewsModel
{

    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }
    public function getFavourite()
    {
        try {
            $query = "SELECT * FROM `favourite` WHERE id";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    
}