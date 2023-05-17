<?php

class HomeModel
{

    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }
    public function getList()
    {
    }
}
