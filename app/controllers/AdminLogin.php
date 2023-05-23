<?php
class AdminLogin extends Controller
{
    public $data = [], $link = "admin/auth/login";

    public function __construct()
    {
        if (isset($_SESSION['adminLogged']) &&  !empty($_SESSION['adminLogged'])) {
            echo header("Location: /admin");
        }
    }
    public function index()
    {
        $this->data['sub_content']['product'] = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginSubmit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $admin = $this->model("AdminModel");
            $result = $admin->checkLogin($email, $password);
            if ($result != false) {
                $_SESSION['adminLogged'] = $result;
                $_SESSION['id_role'] = $this->model("AdminModel")->checkRole($_SESSION['adminLogged']['id'])['id_role'];
                echo '<meta http-equiv="refresh" content="' . 0 . ';url=/admin">';
            } else {
                $this->data['sub_content']['errorsLogin'] = "Thông tin tài khoản hoặc mật khẩu khoogn hợp lệ.";
            }
        }
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
}
