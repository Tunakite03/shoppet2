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
    public function getAllProducts()
    {
        try {
            $query = "SELECT pr.*, p.name as pet_name FROM products pr
            JOIN pets p ON pr.id_pet = p.id";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getProductById($id)
    {
        try {
            $query = "SELECT * FROM products
        WHERE  id= $id";
            $stmt =  $this->db->getInstance($query);
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
    public function getType()
    {
        try {
            $query = "SELECT *
            FROM category_type";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }


    public function getProductCate($id_pet, $name_cate)
    {
        try {
            $query = "SELECT
            pr.*
        FROM
            products pr,
            categories ca,
            category_type cat
        WHERE
            pr.id_type = cat.id AND cat.id_category = ca.id AND ca.name LIKE '%$name_cate%' AND pr.id_pet = $id_pet";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getProductType($id_pet, $name_cate,$name_type)
    {
        try {
            $query = "SELECT
        pr. *
        FROM
            products pr,
            categories ca,
            category_type cat
        WHERE
            pr.id_type = cat.id AND cat.id_category = ca.id AND ca.name LIKE '%$name_cate%' AND cat.name LIKE '%$name_type%' AND pr.id_pet = $id_pet";
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
}
