<?php
class Controller
{
    public function __construct()
    {
        if (isset($_SESSION['loggedID'])) {
            $cart =  $this->model("CartModel");
            $_SESSION['countCart'] = $cart->getCountProductsInCart($_SESSION['loggedID']);
        }
    }
    public function model($model)
    {
        if (file_exists(__DIR_ROOT . "././app/models/" . $model . ".php")) {
            require_once __DIR_ROOT . "./app/models/" . $model . ".php";
            if (class_exists($model)) {
                $model = new $model();
                return $model;
            }
        }
        return false;
    }
    public function render($view, $data = [])
    {
        extract($data);

        if (file_exists(__DIR_ROOT . "./app/views/" . $view . ".php")) {
            require_once(__DIR_ROOT . "./app/views/" . $view . ".php");
        }
    }
    public function ValidatorRegister($name, $email, $password, $confirmPassword)
    {
        $errors = [];
        if (empty($name)) {
            $errors['name'] = "Vui lòng nhập tên";
        } else if (preg_match('/[^\p{L}\s]/u', $name) || strlen($name) >= 100) {
            $errors['name'] = "Tên không được chứa số hoặc ký tự đặc biệt và độ dài nhỏ hơn 100";
        }
        if (empty($email)) {
            $errors['email'] = "Vui lòng nhập email";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email không hợp lệ";
        }
        if (empty($password)) {
            $errors['password'] = "Vui lòng nhập password";
        } else if (!preg_match('/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])[a-zA-Z\d!@#$%^&*]{6,}$/', $password)) {
            $errors['password'] = "Mật khẩu phải chứa ít nhất 1 ký tự đặc biệt, 1 chữ số và có độ dài tối thiểu là 6";
        } else if ($confirmPassword !== $password) {
            $errors['confirmPassword'] = "Mật khẩu không trùng khớp";
        }
        return $errors;
    }
    public function ValidatorLogin($email, $password)
    {
        $errors = [];
        if (empty($email)) {
            $errors['email'] = "Vui lòng nhập email";
        }
        if (empty($password)) {
            $errors['password'] = "Vui lòng nhập password";
        }
        return $errors;
    }
}
