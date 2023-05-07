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
    public function getSearchItemName($searchTerm, $id_pet)
    {
        try {
            $query = "SELECT * FROM `products` WHERE `name` like '%$searchTerm%' and id_pet=$id_pet";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getSearchItemBrand($searchTerm, $id_pet)
    {
        try {
            $query = "SELECT * FROM brands br, products pr WHERE br.id = pr.id_brand  and br.name like '%$searchTerm%'and id_pet=$id_pet";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

    public function getCategories()
    {
        try {
            $query = "SELECT * FROM `categories` WHERE 1";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

    public function getNews()
    {
        try {
            $query = "SELECT * FROM `news`;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getDetail($id)
    {
    }
}
