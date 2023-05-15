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
        $products = $this->model("ProductModel");
        $this->data['sub_content']['data_products'] = $products->getAllProducts();

        $this->link = "admin/products/editProducts";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }


    public function news()
    {
        $id = "";
        $this->data['sub_content']['news'] = "";
        $news = $this->model("NewsModel");

        $this->data['sub_content']['data_news'] = $news->getAllNews();


        $this->link = "admin/news/News";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
    public function addnews()
    {

        $news = $this->model("NewsModel");
        $this->data['sub_content']['data_'] = array();
        $this->link = "admin/news/addNews";

        if (isset($_POST['addnewssubmit'])) {
            $name = $_POST['name'];
            $des_news = $_POST['des_news'];
            // $view=$_POST['view'];
            $content = $_POST['content'];
            $uptime = date('Y-m-d H:i:s');
            $result = $news->AddNews($name, $des_news, $content, $uptime);
            if ($result == 1) {
                echo '<meta http-equiv="refresh" content="' . 0 . ';url=' . $_SERVER['REQUEST_URI'] . '" />';

            } else {
                echo "UpdateFail";
            }
        }
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
    public function editnews($id = '')
    {

        $news = $this->model("NewsModel");
        $this->data['sub_content']['data_news'] = $news->getNewsById($id);

        $this->link = "admin/news/editNews";

        if (isset($_POST['editNewSubmit'])) {
            $name = $_POST['name'];
            $des_news = $_POST['des_news'];
            // $view=$_POST['view'];
            $content = $_POST['content'];
            $uptime = date('Y-m-d H:i:s');
            $result = $news->UpdateNews($id, $name, $des_news, $content, $uptime);
            if ($result == 1) {
                echo '<meta http-equiv="refresh" content="' . 0 . ';url=' . $_SERVER['REQUEST_URI'] . '" />';

            } else {
                echo "UpdateFail";
            }
        }
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
    public function deleteNews($id = '')
    {

        if (is_numeric($id)) {
            $news = $this->model("NewsModel");
            $result = $news->DeleteNews($id);
            header("Location: /admin/news");

        } else {
            header("Location: /admin/news");
        }
    }

    public function customers()
    {
        $this->data['sub_content']['product'] = "";
        $customer = $this->model("UserModel");
        $this->data['sub_content']['data_customer'] = $customer->getAllUsers();

        $this->link = "admin/customers/Customers";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
    public function editcustomer($id = '')
    {

        $customer = $this->model("UserModel");
        $this->data['sub_content']['data_customer'] = $customer->getUserById($id);

        $this->link = "admin/customers/editCustomers";

        if (isset($_POST['editusersubmit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];


            $result = $customer->UpdateCustomer($id,$name,$email,$password,$address,$phone);
            if ($result == 1) {
                echo '<meta http-equiv="refresh" content="' . 0 . ';url=' . $_SERVER['REQUEST_URI'] . '" />';

            } else {
                echo "UpdateFail";
            }
        }
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
    public function deletecustomer($id = '')
    {

        if (is_numeric($id)) {
            $customer = $this->model("UserModel");
            $result = $customer->DeleteCustomer($id);
            header("Location: /admin/customers");

        } else {
            header("Location: /admin/customers");
        }
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