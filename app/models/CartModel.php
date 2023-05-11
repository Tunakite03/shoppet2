<?php

class CartModel
{
    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }
    public function getListCartItems($idUser)
    {
        try {
            $query = "SELECT    ca.id,
            ca.id_product,
            ca.quantity,
            ca.total,
            cu.name AS customer_name,
            cu.email,
            p.name AS product_name,
            p.price,
            p.image as image,
            p.id_pet as id_pet
            FROM cart ca
            INNER JOIN customers cu ON ca.id_customer = cu.id
            INNER JOIN products p ON ca.id_product = p.id
            WHERE ca.id_customer = $idUser ";
            $stmt =  $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

    public function getAllTotalMoney($idUser)
    {
        try {
            $query = "SELECT sum(total) as alltotal FROM cart 
            WHERE id_customer = $idUser ";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function addtoCart($id_product, $idUser, $quantity)
    {
        try {
            $query = "INSERT INTO `cart`(`id`, `id_customer`, `id_product`, `quantity`, `total`) 
            VALUES (NULL, '$idUser', '$id_product', $quantity, $quantity*(SELECT `price` FROM `products` WHERE `id` = '$id_product'))";
            $stmt =  $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getProductInCart($id_product, $idUser)
    {
        try {
            $query = "SELECT * FROM cart 
            WHERE id_customer = $idUser and id_product = $id_product";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getCountProductsInCart($id_user)
    {
        try {
            $query = "SELECT Count($id_user) as count FROM cart 
            WHERE id_customer = $id_user";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function updateCartItemQuantity($id, $quantity, $id_user)
    {
        try {
            $query = "UPDATE `cart` SET `quantity`=$quantity WHERE `id`= $id and `id_customer`=$id_user";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function updateCartTotal($id, $id_user)
    {
        try {
            // Create trigger to update total when quantity is updated
            $query = "UPDATE cart SET total = quantity * (SELECT price FROM products p WHERE p.id = cart.id_product ) WHERE id = $id and `id_customer` = $id_user;";
            $this->db->exec($query);
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function deleteItem($id)
    {
        try {
            $query = "DELETE FROM `cart` WHERE `id`= $id";
            $stmt =  $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function totalMoney($idUser)
    {
        try {
            $query = "SELECT SUM(total) as totalMoney
            FROM cart
            WHERE id_customer = $idUser";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    
}
