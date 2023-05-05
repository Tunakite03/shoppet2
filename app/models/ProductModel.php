<?php

class ProductModel
{
    private $db;
    function __construct()
    {
            $this->db = new ConnectDB();   
    }
    
    public function getListProducts()
    {
        try {
            $query = "SELECT * FROM `products` ORDER BY 'id' Desc limit 8";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    
    public function getProductDogAll(){
        // b1:kết nối database
        try {
            $query = "SELECT * FROM `products` WHERE `id_pet` =1";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getProductDogAllNoSale(){
        // b1:kết nối database
        if (!$this->db) {
            $this->db = new ConnectDB();
        }
        try {
            $query = "SELECT * FROM `products` WHERE `id_pet` = 1 AND `sale` = 0;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }

    }
    public function getProductSaleDogAll(){
        // b1:kết nối database
       
        try {
            $query = "SELECT * FROM `products` WHERE `id_pet` = 1 AND `sale` > 0;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }

    }

    public function getProductCatAll(){
        // b1:kết nối database
        
        try {
            $query = "SELECT * FROM `products` WHERE `id_pet` = 2;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        } 

    }
    public function getProductCatAllNoSale(){
        if (!$this->db) {
            $this->db = new ConnectDB();
        }
        try {
            $query = "SELECT * FROM `products` WHERE `id_pet` = 2 AND `sale` = 0;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        } 

    }
    public function getProductSaleCatAll(){
        // b1:kết nối database
        if (!$this->db) {
            $this->db = new ConnectDB();
        }
        try {
            $query = "SELECT * FROM `products` WHERE `id_pet` = 2 AND `sale` > 0;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        } 

    }
    
    
}
