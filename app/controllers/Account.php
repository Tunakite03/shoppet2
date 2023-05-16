<?php
class Account extends Controller
{
    public $data = [];
    public $link = "account/index", $linkforgotpassword = "account/forgotpassword";

    public function __construct()
    {
        if (isset($_SESSION['loggedID'])) {
            header("Location: /");
        }
    }
    public function index()
    {
        $this->data['sub_content']['product'] = "";
        $this->data['content'] = $this->link; // đường dẫn tới file view

        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
    public function register()
    {

        $errors = [];
        $result = false;
        $this->data['sub_content']['errors'] = "";
        $this->data['sub_content']['successRegister'] = "";
        $user = $this->model("UserModel");
        if (isset($_POST['registerSubmit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($user->getUser($email) != false) {
                $errors['user'] = "Tài khoản đã tồn tại";
            }
            $this->data['sub_content']['errorsRegister'] = $errors;
            if (empty($errors)) {
                $result = $user->insertUser($name, $email, $password);
            }
        } else {
            header("Location: /account");
            exit(); // It's a good practice to exit after redirecting
        }
        if ($result) {
            $this->data['sub_content']['successRegister'] = true;
        }
        $this->data['content'] = $this->link; // đường dẫn tới file view
        $this->render('layouts/client_layout', $this->data);
    }


    public function login()
    {
        $user = $this->model("UserModel");
        $formErrors = [];
        $result = false;
        $this->data['sub_content']['errors'] = "";
        $this->data['sub_content']['successLogin'] = "";
        if (isset($_POST['loginSubmit'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $formErrors = $this->ValidatorLogin($email, $password);
            $this->data['sub_content']['errorsLogin'] = $formErrors;
            if (empty($formErrors)) {
                if ($user->checkLogin($email, $password) !== false) {
                    $result = true;
                } else {
                    $formErrors['loginFail'] = "Tài khoản hoặc mật khẩu không đúng";
                }
            }
            $this->data['sub_content']['errorsLogin'] = $formErrors;
        } else {
            header("Location: /account");
            exit(); // It's a good practice to exit after redirecting
        }
        if ($result) {
            $infoUser = $user->getUser($email);
            $_SESSION['loggedUserName'] = $infoUser['name'];
            $_SESSION['loggedID'] = $infoUser['id'];
            header("Location: /");
        }
        $this->data['content'] = $this->link; // đường dẫn tới file view
        $this->render('layouts/client_layout', $this->data);
    }
    public function forgotpassword()
    {
        $this->data['sub_content']['error'] = "";
        $email = "";
        $user = $this->model("UserModel");

        // Hàm để tạo mật khẩu ngẫu nhiên
        function generatePassword() {
            // Độ dài mật khẩu
            $length = 8;
            $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+'; // Bộ ký tự cho mật khẩu
        
            // Tạo mật khẩu ngẫu nhiên
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                $password .= $charset[rand(0, strlen($charset) - 1)];
            }
        
            // Đảm bảo mật khẩu chứa ít nhất một ký tự đặc biệt, một số và một chữ cái thường
            while (!preg_match('/\d/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[\W_]/', $password)) {
                $password = '';
                for ($i = 0; $i < $length; $i++) {
                    $password .= $charset[rand(0, strlen($charset) - 1)];
                }
            }
        
            return $password;
        }

        if (isset($_POST['submitforgotpass'])) {
            $email = $_POST['email'];
            $checkemail = $user->CheckEmail($email);
            if ($checkemail->rowCount() > 0) {
                $password = generatePassword();
                echo $password;
                $result= $user->UpdatePassWord($email, $password);
                $this->data['sub_content']['success'] = "success";
            } else {
                $this->data['sub_content']['error'] = "error";
            }
        }

        $this->data['content'] = $this->linkforgotpassword; // đường dẫn tới file view
        $this->render('layouts/client_layout', $this->data);
    }
    public function logout()
    {
        unset($_SESSION['loggedUserName']);
        unset($_SESSION['loggedID']);
        header("Location: /account");
    }
}