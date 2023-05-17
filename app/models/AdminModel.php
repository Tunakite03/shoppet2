<?php

class AdminModel
{

    private $db;
    function __construct()
    {
        $this->db = new ConnectDB();
    }
<<<<<<< HEAD
    public function getAllAdmin()
    {
        try {
            $query = "SELECT admin.id, admin.name, admin.email,admin.password ,admin.id_role , role_admin.name AS name_role
            FROM admin
            INNER JOIN role_admin ON admin.id_role = role_admin.id;";
            $stmt = $this->db->getList($query);
=======
    public function checkLogin($email, $password)
    {
        try {
            $query = "SELECT * FROM `admin`
             WHERE email='$email' and password = '$password'";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function insertAdmin($name, $email, $password, $role)
    {
        try {
            $query = "INSERT INTO `admin`(`id`,`name`, `email`, `password`, `id_role`) 
            VALUES (null,'$name','$email','$password',$role)";
            $stmt =  $this->db->exec($query);
>>>>>>> 71679c122d10b901453da043b4762240e671c883
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getAdminByID($id)
    {
        try {
            $query = "SELECT admin.id, admin.name, admin.email,admin.password ,admin.id_role , role_admin.name AS name_role
            FROM admin
            INNER JOIN role_admin ON admin.id_role = role_admin.id
            WHERE admin.id=$id ;";
            $stmt = $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function insertAdmin($name, $email, $password, $id_role)
    {
        try {
            $query = "INSERT INTO `admin`(`id`,`name`, `email`, `password`, `id_role`) 
            VALUES (null,'$name','$email','$password',$id_role)";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function UpdateAdmin($id, $name, $email, $password, $id_role)
    {
        try {
            $query = "UPDATE `admin`
            SET `name` = '$name', `email` = '$email',  `password` = '$password', `id_role` = '$id_role'
            WHERE `id` = $id;";
            $stmt = $this->db->exec($query);

            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function editAdmin(
        $id,
        $name,
        $email,
        $password,
        $id_role
    ) {
        try {
            $query = "UPDATE `admin` 
            SET
            `id`=$id,
            `name`='$name',
            `email`=$email,
            `password`=$password,
            `id_role`='$id_role'
            WHERE id=$id";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function DeleteAdmin($id)
    {
        try {
            $query = " DELETE FROM `admin` WHERE `id`= $id ;";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }


    public function getCategoryByID($id)
    {
        try {
            $query = "SELECT cat.name as name_cate, cat.id as cate_id, cty.name as name_subcate, cty.id as subcate_id FROM `categories` cat
            JOIN `category_type` cty ON cat.id = cty.id_category
<<<<<<< HEAD
             WHERE cat.id='$id'";
            $stmt = $this->db->getList($query);
=======
             WHERE cat.id=$id";
            $stmt =  $this->db->getList($query);
>>>>>>> 71679c122d10b901453da043b4762240e671c883
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getAdmin($email)
    {
        try {
            $query = "SELECT * FROM `admin` WHERE `email`='$email'";
            $stmt = $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getInfoAdmin($id)
    {
        try {
            $query = "SELECT ad.*, ro.role as role FROM `admin` ad
              Join role_admin ro ON ro.id = ad.id_role
              WHERE ad.id=$id";
            $stmt =  $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getListAdmin($id)
    {
        try {
            $query = "SELECT ad.*, ro.role as role  FROM `admin` ad
            Join role_admin ro ON ro.id = ad.id_role
            where ad.id <> $id";
            $stmt =  $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

    public function deleteAdmin($id)
    {
        try {
            $query = "DELETE FROM `admin` where id= $id";
            $stmt =  $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getPets()
    {
        try {
            $query = "SELECT * FROM `pets`;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getRole()
    {
        try {
            $query = "SELECT * FROM `role_admin`;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getSubcate()
    {
        try {
            $query = "SELECT * FROM `category_type`;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

    public function updateNameCategory($id, $cate_name)
    {
        try {
            $query = "UPDATE `categories` SET `name`='$cate_name' WHERE id='$id'";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function deleteSubcategory($id)
    {
        try {
            $query = "DELETE FROM `category_type` WHERE id = $id";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function insertSubcategory($id_category, $subcate_name)
    {
        try {
            $query = "INSERT INTO category_type (id_category, name)
            VALUES ($id_category, '$subcate_name')";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function checkNameSubcateExist($id_category, $subcate_name)
    {
        try {
            $query = "SELECT * FROM category_type where id_category = $id_category and name = '$subcate_name' ";

            $stmt = $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getBrands()
    {
        try {
            $query = "SELECT * FROM `brands`;";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getProductById($id)
    {
        try {
            $query = "SELECT pr.*, p.name as pet_name, b.name as brand_name, cty.id as id_type ,cty.name as subcate_name, cat.name as cate_name, cat.id as id_cate FROM products pr
            JOIN pets p ON pr.id_pet = p.id
            JOIN brands b ON pr.id_brand = b.id
            JOIN category_type cty ON cty.id= pr.id_type
            JOIN categories cat ON cty.id_category = cat.id 
        WHERE  pr.id= $id";
            $stmt = $this->db->getInstance($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function getListRole()
    {
        try {
            $query = "SELECT * FROM `role_admin`";
            $stmt = $this->db->getList($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function deleteProduct($id)
    {
        try {
            $query = "DELETE FROM `products` WHERE id=$id";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

    public function addNewProduct(
        $id_type,
        $id_pet,
        $name,
        $id_brand,
        $image,
        $price,
        $sale,
        $des,
        $quantity

    ) {
        try {
            $query = "INSERT INTO `products`(`id`, `id_type`, `id_pet`, `name`, `id_brand`, `image`, `price`, `sale`, `des`, `quantity`,`number_sell`) 
            VALUES (Null
            ,$id_type
            ,$id_pet
            ,'$name'
            ,$id_brand
            ,'$image'
            ,$price
            ,$sale
            ,'$des'
            ,$quantity
            ,0)";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }

    public function updateTypeProductToNull($id_subcate)
    {
        try {
            $query = "UPDATE `products` SET `id_type`= 6
            WHERE id_type=$id_subcate";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function editImageProduct($id, $image)
    {
        try {
            $query = "UPDATE `products` 
            SET `image`='$image'
            WHERE id=$id";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
    public function editProduct(
        $id,
        $id_type,
        $id_pet,
        $name,
        $id_brand,
        $price,
        $sale,
        $des,
        $quantity,

    ) {
        try {
            $query = "UPDATE `products` 
            SET
            `id_type`=$id_type,
            `id_pet`=$id_pet,
            `name`='$name',
            `id_brand`=$id_brand,
            `price`=$price,
            `sale`=$sale,
            `des`='$des',
            `quantity`=$quantity
            WHERE id=$id";
            $stmt = $this->db->exec($query);
            return $stmt;
        } catch (\Throwable $ex) {
            echo $ex;
        }
    }
}