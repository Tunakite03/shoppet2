<?php

class HomeModel
{

    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }
    public function getListHome()
    {
        // try {
        //     $query = "SELECT * FROM `book` ORDER BY 'book_id' Desc limit 8";
        //     $stmt =  $this->db->getList($query);
        //     return $stmt;
        // } catch (\Throwable $ex) {
        //     echo $ex;
        // }
    }
}
