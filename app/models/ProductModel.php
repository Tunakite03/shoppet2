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
            $query = "SELECT * FROM `products` ORDER BY 'id' Desc limit 8;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getListProductNew_Dog()
    {
        try {
            $query = "SELECT * FROM products WHERE id_pet = 1 ORDER BY id DESC limit 8;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getListProductNew_Cat()
    {
        try {
            $query = "SELECT * FROM products WHERE id_pet = 2 ORDER BY id DESC limit 8;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getListProductTrend_Dog()
    {
        try {
            $query = "SELECT * FROM products WHERE id_pet = 1 ORDER BY number_sell DESC limit 8;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getListProductTrend_Cat()
    {
        try {
            $query = "SELECT * FROM products WHERE id_pet = 2 ORDER BY number_sell DESC limit 8;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getProductDogAll()
    {
        // b1:kết nối database
        try {
            $query = "SELECT * FROM `products` WHERE `id_pet` =1";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

    public function getProductSaleDogAll()
    {
        // b1:kết nối database
        try {
            $query = "SELECT * FROM `products` WHERE `id_pet` = 1 AND `sale` > 0;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

    public function getDetail($id_pet, $id_product)
    {   
        
        try {
            
            $query = "SELECT * FROM `products` WHERE `id_pet`= $id_pet and `id`=$id_product";
            $stmt = $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }


    public function getProductCatAll()
    {
        // b1:kết nối database
        try {
            $query = "SELECT * FROM `products` WHERE `id_pet` = 2;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

    public function getProductSaleCatAll()
    {
        // b1:kết nối database
        try {
            $query = "SELECT * FROM `products` WHERE `id_pet` = 2 AND `sale` > 0;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    
}
