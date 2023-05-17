<?php

class ProfileModel
{
    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }

    // public function getCustomer($id)
    // {
    //     try {
    //         $query = "SELECT * FROM `customers` WHERE id=$id";
    //         $stmt =  $this->db->getList($query);
    //         return $stmt;
    //     } catch (\Throwable $ex) {
    //         echo $ex;
    //     }
    // }
    public function getCustomerInfoID($id)
    {
        try {
            $query = "SELECT * FROM `info_customers` WHERE id_customer=$id";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
}
?>