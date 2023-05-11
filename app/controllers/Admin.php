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

    public function products()
    {
        $this->data['sub_content']['product'] = "";
        $products = $this->model("ProductModel");
        $this->data['sub_content']['data_products'] = $products->getAllProducts();

        $this->link = "admin/products/listProducts";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
    public function deleteproduct($id = '')
    {
        if (is_numeric($id)) {
            $this->data['sub_content']['product'] = "";
            $admin = $this->model("AdminModel");
            $result = $admin->deleteProduct($id);
            header("Location: /admin/products");
        } else {
            header("Location: /admin/products");
        }
    }
    public function editproduct($id = '')
    {
        if (is_numeric($id)) {
            $admin = $this->model("AdminModel");
            $products = $this->model("ProductModel");

            $this->data['sub_content']['data_product'] = $admin->getProductById($id);
            $this->data['sub_content']['data_pets'] = $admin->getPets();
            $this->data['sub_content']['data_brands'] = $admin->getBrands();
            $this->data['sub_content']['data_categories'] = $products->getCategories();


            $this->link = "admin/products/editProduct";
            $this->data['content'] = $this->link; // đường dẫn tới file view
            // Render Views
            $this->render('layouts/admin_layout', $this->data);
        } else {
            header("Location: /admin/products");
        }
    }
    public function customers()
    {
        $this->data['sub_content']['product'] = "";
        $customers = $this->model("UserModel");
        $this->data['sub_content']['data_customers'] = $customers->getAllUsers();

        $this->link = "admin/customers/editcustomers";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
    public function categories()
    {
        $this->data['sub_content']['product'] = "";
        $categories = $this->model("ProductModel");
        $this->data['sub_content']['data_categories'] = $categories->getCategoriesInfo();
        $this->link = "admin/categories/editcategories";
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
