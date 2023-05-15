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
    public function getInfoUser($id_user)
    {
        try {
            $query = "SELECT * FROM `info_customers` WHERE id_customer = $id_user ";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function UpdateCustomer($id,$name,$email,$password,$address,$phone){
        try {
            $query = "UPDATE customers
            SET `name` = '$name', `email` = '$email',  `password` = '$password', `address` = '$address' , `phone` = '$phone'
            WHERE `id` = $id;";
            $stmt =  $this->db->exec($query);

            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getAllUsers()
    {
        try {
            $query = "SELECT * FROM customers Where 1";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function DeleteCustomer($id)
    {
        try {
            $query = " DELETE FROM customers WHERE `id`= $id ;";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
}
