<?php
class Account extends Controller
{
    public $data = [];
    public $link = "account/index";
    public function index()
    {
        if (isset($_SESSION['loggedID'])) {
            header("Location: /");
        } else {
            $this->data['sub_content']['product'] = "";
            $this->data['content'] = $this->link; // đường dẫn tới file view

            // Render Views
            $this->render('layouts/client_layout', $this->data);
        }
    }
    public function register()
    {
        if (isset($_SESSION['loggedID'])) {
            header("Location: /");
        } else {
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
    }



    public function login()
    {
        if (isset($_SESSION['loggedID'])) {
            header("Location: /");
        } else {

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
    }
    public function logout()
    {
        unset($_SESSION['loggedUserName']);
        unset($_SESSION['loggedID']);
        header("Location: /account");
    }
}
