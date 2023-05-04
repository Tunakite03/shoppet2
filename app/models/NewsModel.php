<?php

class NewsModel
{

    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }
    public function getListNewsLastest()
    {  
        try {
            $query = "SELECT * FROM `news` ORDER BY 'id' Desc limit 3";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
}
