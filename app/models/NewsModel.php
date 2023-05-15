<?php

class NewsModel
{

    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }
    public function getListNewsLastest()
    {
        try {
            $query = "SELECT * FROM `news` ORDER BY 'id' Desc limit 3";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getAllNews()
    {
        try {
            $query = "SELECT * FROM `news` ";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getNewsById($id)
    {
        try {
            $query = "SELECT * FROM news 
        WHERE  id= $id";
            $stmt = $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function UpdateNews($id,$name,$des_news,$content,$uptime)
    {
        try {
            $query = "UPDATE news
            SET `name` = '$name', `des_news` = '$des_news',  `content` = '$content', `uptime` = '$uptime'
            WHERE `id` = $id;";
        
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function DeleteNews($id)
    {
        try {
            $query = " DELETE FROM news WHERE `id`= $id ;";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function AddNews($name,$des_news,$content,$uptime)
    {
        try {
            $query = "INSERT INTO news (name, des_news, content, uptime) VALUES ('$name', '$des_news', '$content', '$uptime');";
        
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

}