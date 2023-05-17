<?php

class CheckoutModel
{

    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }
    public function insertOrder($idUser, $total, $date, $address)
    {
        try {
            $query = "INSERT INTO `orders`(`id`, `customer_id`, `total`, `date`, `address`) VALUES (NULL,$idUser,$total, '$date', '$address')";
            $stmt =  $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function insertOrderDetail($orderId, $productId, $quantity, $price, $date)
    {
        try {
            $query = "INSERT INTO `order_items`(`id`, `order_id`, `product_id`, `quantity`, `price`, `date`) VALUES (Null,$orderId,$productId,$quantity,$price,'$date')";
            $stmt =  $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getLastOrderId($id_user)
    {
        try {
            $query = "SELECT * FROM `orders` WHERE customer_id = $id_user ORDER BY id DESC  Limit 1";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getInfoConfirmUser($id_user)
    {
        try {
            $query = "SELECT o.id as id_order, o.date as date, c.name as customer_name, ic.phone as phone, o.address as address, o.total as total_money
            FROM orders o 
            JOIN order_items od ON o.id = od.order_id 
            JOIN customers c ON o.customer_id = c.id
            JOIN info_customers ic ON c.id = ic.id_customer
            where customer_id = $id_user 
            order by o.id desc limit 1";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getListOrder($con, $value)
    {
        try {
            switch ($con) {
                case 'day':
                    $startDate = $value . ' 00:00:00';
                    $endDate = $value . ' 23:59:59';
                    $query = "SELECT
            SUM(od.id) as number_sell_product,
                od.*,
                pr.name AS product_name,
                pr.price AS product_price,
                pr.sale AS product_sale,
                pr.import_price,
             
            FROM
                `order_items` od
            JOIN products pr ON
                pr.id = od.product_id
            Where date BETWEEN '$startDate' AND '$endDate '
            GROUP BY od.product_id";
                    break;

                case 'month':
                    $year = intval(date('Y', strtotime($value)));
                    $month = intval(date('m', strtotime($value)));
                    $query = "SELECT
                SUM(od.id) as number_sell_product,
                    od.*,
                    pr.name AS product_name,
                    pr.price AS product_price,
                    pr.sale AS product_sale,
                    pr.import_price,
                    pr.number_sell
                FROM
                    `order_items` od
                JOIN products pr ON
                    pr.id = od.product_id
                Where  YEAR(date) = $year AND MONTH(date) = $month
                GROUP BY od.product_id";
                    break;
                case 'year':
                    $query = "SELECT
                    SUM(od.id) as number_sell_product,
                        od.*,
                        pr.name AS product_name,
                        pr.price AS product_price,
                        pr.sale AS product_sale,
                        pr.import_price,
                     
                    FROM
                        `order_items` od
                    JOIN products pr ON
                        pr.id = od.product_id
                    Where  YEAR(date) = $value
                    GROUP BY od.product_id";
                    break;

                default:
                    # code...
                    break;
            }
            // echo $query;
            // die;
            $stmt =  $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getSellProduct($con, $value)
    {
        try {
            $query = "SELECT od.*, pr.name as product_name, pr.price as product_price , pr.sale as product_sale, pr.import_price, pr.number_sell FROM `order_items` od
            Join products pr ON pr.id = od.product_id
            Where $con(date) = $value";
            $stmt =  $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

    public function getInfoConfirmProduct($id_order)
    {
        try {
            $query = "SELECT p.image as image, p.name as product_name,  od.quantity as quantity, od.price as price, o.total as total_money, pets.name as pet_name
            FROM orders o 
            JOIN order_items od ON o.id = od.order_id 
            JOIN products p ON od.product_id = p.id
            JOIN pets ON p.id_pet = pets.id
            where o.id = $id_order ";
            $stmt =  $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function completeOrder($id_user)
    {
        try {
            $query = "DELETE FROM `cart` WHERE id_customer= $id_user";
            $stmt =  $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
}
