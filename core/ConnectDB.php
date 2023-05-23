<?php

class ConnectDB
{
    var $db = null;
    function __construct()
    {
        //Kết nối database
        try {
            $config = [
                "host" => "localhost",
                "user" => 'root',
                "pass" => '',
                "db" => "shoppet5"
            ];

            //Cấu hình dsn
            $dsn = 'mysql:dbname=' . $config['db'] . ';host=' . $config['host'];

            //Cấu hình $options
            /*
             * - Cấu hình utf8
             * - Cấu hình ngoại lệ khi truy vấn bị lỗi
             * */
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            //Câu lệnh kết nối
            $this->db = new PDO($dsn, $config['user'], $config['pass'], $options);
        } catch (Exception $e) {
            $mess = $e->getMessage();
            echo $mess;
            die();
        }
    }

    //Truy vấn câu lệnh SQL
    function query($sql)
    {

        try {
            $statement = $this->db->prepare($sql);

            $statement->execute();

            return $statement;
        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            $data['message'] = $mess;
            echo $mess;
            die();
        }
    }
    // lấy ra danh sách sản phẩm
    public function getList($select)
    {
        return $this->db->query($select);
    }
    // Lấy ra 1 sản phẩm
    public function getInstance($select)
    {
        $result = $this->query($select);
        $result = $result->fetch();
        return $result;
    }
    // thêm, xóa, sửa
    public function exec($query)
    {
        return $this->db->exec($query);
    }
}
