<?php

class ProductModel
{
    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }
    public function list_products()
    {
        try {
            $query = "SELECT * FROM `book` ORDER BY 'book_id' Desc limit 8";
            $stmt =  $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getDetail($id)
    {
    }
}