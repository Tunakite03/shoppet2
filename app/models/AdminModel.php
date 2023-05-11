<?php

class AdminModel
{

    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }
    public function insertAdmin($name, $email, $password, $role)
    {
        try {
            $query = "INSERT INTO `admin`(`id`,`name`, `email`, `password`, `role`) 
            VALUES (null,'$name','$email','$password',$role)";
            $stmt =  $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getAdmin($email)
    {
        try {
            $query = "SELECT * FROM `admin` WHERE `email`='$email'";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }


    public function getPets()
    {
        try {
            $query = "SELECT * FROM `pets`;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getBrands()
    {
        try {
            $query = "SELECT * FROM `brands`;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getProductById($id)
    {
        try {
            $query = "SELECT pr.*, p.name as pet_name, b.name as brand_name, cty.name as subcate_name, cat.name as cate_name, cat.id as id_cate FROM products pr
            JOIN pets p ON pr.id_pet = p.id
            JOIN brands b ON pr.id_brand = b.id
            JOIN category_type cty ON cty.id= pr.id_type
            JOIN categories cat ON cty.id_category = cat.id 
        WHERE  pr.id= $id";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function deleteProduct($id)
    {
        try {
            $query = "DELETE FROM `products` WHERE id=$id";
            $stmt = $this->db->exec($query);
            echo ($stmt);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function editProduct(
        $id,
        $id_type,
        $id_pet,
        $name,
        $id_brand,
        $image,
        $price,
        $sale,
        $des,
        $quantity,
        $preserve,
        $product_manual,
    ) {
        try {
            $query = "UPDATE `products` 
            SET
            `id_type`=$id_type,
            `id_pet`=$id_pet,
            `name`='$name',
            `id_brand`=$id_brand,
            `image`=$image,
            `price`=$price,
            `sale`=$sale,
            `des`='$des'
            `quantity`=$quantity,
            `preserve`='$preserve',
            `product_manual`='$product_manual',
            WHERE id=$id";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
}
