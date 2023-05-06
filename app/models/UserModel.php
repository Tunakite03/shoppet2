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
}
