<?php

class UserModel
{
    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }
    public function getUser($email)
    {
        try {
            $query = "SELECT * FROM `customers` WHERE `email`='$email'";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getUserById($id)
    {
        try {
            $query = "SELECT * FROM `customers` WHERE `id`='$id'";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

    public function insertUser($name, $email, $password)
    {
        try {
            $query = "INSERT INTO `customers` (`id`, `name`, `email`, `password`,  `address`, `phone`) VALUES (NULL, '$name', '$email', '$password', Null, Null);";
            $stmt =  $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function checkLogin($email, $password)
    {
        try {
            $query = "SELECT * FROM `customers` WHERE `email`='$email' and `password` = '$password'";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function insertInfoUser($user)
    {
        try {
            $query = "INSERT INTO `info_customers`(`id`, `id_customer`, `fullname`, `email`, `phone`, `province`,`district`, `ward`, `street`)
             VALUES (Null, '" . $user['id_customer'] . "','" . $user['fullname'] . "' ,'" . $user['email'] . "','" . $user['phone'] . "','" . $user['province'] . "','" . $user['district'] . "','" . $user['ward'] . "','" . $user['street'] . "')";
            $stmt =  $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getInfoUserById($id)
    {
        try {
            $query = "SELECT cu.*, info.phone as phone , info.province,  info.district,  info.ward,  info.street
            FROM customers cu
            LEFT JOIN info_customers info ON cu.id = info.id_customer
            where cu.id= $id";
            $stmt = $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function UpdateCustomer($id, $name,  $phone, $province, $district, $ward, $street)
    {
        try {
            $query = "UPDATE customers
            SET `name` = '$name'
            WHERE `id` = $id;";
            $stmt =  $this->db->exec($query);
            $query = "UPDATE info_customers
            SET `phone` = '$phone',
        `fullname`='$name',
        `province`='$province',
        `district`='$district',
        `ward`='$ward',
        `street`='$street'
            WHERE `id_customer` = $id";

            $stmt =  $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getAllUsers()
    {
        try {
            $query = "SELECT cu.*, info.phone as phone , CONCAT(info.province, ', ', info.district, ', ', info.ward, ', ', info.street) as address
            FROM customers cu
            LEFT JOIN info_customers info ON cu.id = info.id_customer";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function DeleteCustomer($id)
    {
        try {
            $query = " DELETE FROM info_customers WHERE `id_customer`= $id";
            $stmt = $this->db->exec($query);
            $query = " DELETE FROM customers WHERE `id`= $id";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
}
