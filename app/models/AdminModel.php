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
}
