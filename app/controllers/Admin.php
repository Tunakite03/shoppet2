<?php
class Admin extends Controller
{
    public $data = [], $link = "admin/dashboard";

    public function index()
    {
        $this->data['sub_content']['product'] = "";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
    public function editproducts()
    {
        $this->data['sub_content']['product'] = "";


        $this->link = "admin/products/editProducts";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
    public function login()
    {
        $this->data['sub_content']['product'] = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginSubmit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
        }
        $this->link = "admin/auth/login";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }

    public function registerAdmin()
    {
        $this->data['sub_content']['product'] = "";

        $admin = $this->model("AdminModel");

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registerSubmit'])) {
            $error = [];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = 1;

            if ($admin->getAdmin($email) != false) {
                $error['existAdmin'] = 'Email đã tồn tại';
            } else {
                $result = $admin->insertAdmin($name, $email, $password, $role);
                if ($result !== false) {
                    header("location: /admin");
                }
                $error['registerfaild'] = 'Không thể đăng kí vui lòng thử lại sau';
            }
            $this->data['sub_content']['errorsRegister'] = $error;
        }

        $this->link = "admin/auth/register";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
}
