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
            $this->data['sub_content']['successEdit'] = "";

            // Edit image of product
            // Check if the form was submitted
            // Edit image of product
            // Check if the form was submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editImageSubmit'])) {
                // Get the uploaded file name
                $imageName = $_FILES['image']['name'];

                // Check if a file was uploaded
                if ($imageName !== '') {
                    // Get the temporary file name and path
                    $tmpName = $_FILES['image']['tmp_name'];

                    // Create a unique file name to avoid overwriting existing files
                    $newName = uniqid() . '_' . $imageName;

                    // Get the file extension
                    $extension = pathinfo($newName, PATHINFO_EXTENSION);

                    // Define the allowed file types
                    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

                    // Check if the file type is allowed
                    if (in_array(strtolower($extension), $allowedTypes)) {
                        // Define the upload directory
                        $uploadDir = 'public/assets/img/img_pet/';

                        // Check if a file with the same name already exists
                        if (file_exists($uploadDir . $newName)) {
                            $this->data['sub_content']['errorsEdit'] = "Tên file đã tồn tại.";
                        } else {
                            // Check the file size is less than 500 KB
                            if ($_FILES['image']['size'] > 500000) {
                                $this->data['sub_content']['errorsEdit'] = "Kích thướt file lớn hơn 500 KB.";
                            } else {
                                // Create the upload directory if it doesn't exist
                                if (!file_exists($uploadDir)) {
                                    mkdir($uploadDir, 0777, true);
                                }
                                // Upload the file to the server
                                $uploadPath = $uploadDir . $newName;
                                if (move_uploaded_file($tmpName, $uploadPath)) {

                                    // Update the image name in the database
                                    $result =  $admin->editImageProduct($id, $newName);
                                    // Redirect back to the edit page
                                    if ($result == 1) {
                                        $this->data['sub_content']['successEdit'] = true;
                                    }
                                    // echo "okiii";
                                    // die;
                                } else {
                                    // Handle the upload error
                                    $this->data['sub_content']['errorsEdit'] = "Xảy ra lỗi trong khi upload ảnh";
                                }
                            }
                        }
                    } else {
                        // Handle the invalid file type
                        $this->data['sub_content']['errorsEdit'] = "Vui lòng chọn file có đuôi: JPG, JPEG, PNG, and GIF files are allowed.";
                    }
                } else {
                    // Handle the missing file error
                    $this->data['sub_content']['errorsEdit'] = "Vui lòng chọn file";
                }
            }


            // Edit info product

            if (isset($_POST['editProductSubmit'])) {
                $name = $_POST['name'];
                $pet_id = $_POST['pet_id'];
                $quantity = $_POST['quantity'];
                $price = $_POST['price'];
                $cate_id = $_POST['cate_id'];
                $subcate_id = $_POST['sub_id'];
                $brand_id = $_POST['brand_id'];
                $sale = $_POST['sale'];
                $des = $_POST['des'];
                $result = $admin->editProduct(
                    $id,
                    $subcate_id,
                    $pet_id,
                    $name,
                    $brand_id,
                    $price,
                    $sale,
                    $des,
                    $quantity
                );
                if ($result == 1) {
                    $this->data['sub_content']['successEdit'] = true;
                } else {
                    $this->data['sub_content']['errorsEdit'] = "Chinh sua khong thanh cong";
                }
            }
            $this->data['sub_content']['data_product'] = $admin->getProductById($id);
            $this->data['sub_content']['data_pets'] = $admin->getPets()->fetchAll();
            $this->data['sub_content']['data_brands'] = $admin->getBrands()->fetchAll();
            $this->data['sub_content']['data_categories'] = $products->getCategories()->fetchAll();
            $this->data['sub_content']['data_subCategory'] = $admin->getSubcate()->fetchAll();
            $this->link = "admin/products/editProduct";
            $this->data['content'] = $this->link; // đường dẫn tới file view
            // Render Views
            $this->render('layouts/admin_layout', $this->data);
        } else {
            header("Location: /admin/products");
        }
    }
    public function addNewProduct()
    {
        $admin = $this->model("AdminModel");
        $products = $this->model("ProductModel");
        $this->data['sub_content']['successAdd'] = "";
        $errors = "";
        // Edit info product
        if (isset($_POST['addNewSubmit'])) {
            $imageName = $_FILES['image']['name'];

            // Get the temporary file name and path
            $tmpName = $_FILES['image']['tmp_name'];

            // Create a unique file name to avoid overwriting existing files
            $imageName = uniqid() . '_' . $imageName;

            // Get the file extension
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);

            // Define the allowed file types
            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

            // Check if the file type is allowed
            if (in_array(strtolower($extension), $allowedTypes)) {
                // Define the upload directory
                $uploadDir = 'public/assets/img/img_pet/';
                // Check the file size is less than 500 KB
                if ($_FILES['image']['size'] > 500000) {
                    $errors = "Kích thướt file lớn hơn 500 KB.";
                } else {
                    // Create the upload directory if it doesn't exist
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    // Upload the file to the server
                    $uploadPath = $uploadDir . $imageName;
                    if (move_uploaded_file($tmpName, $uploadPath)) {
                    } else {
                        // Handle the upload error
                        $errors = "Xảy ra lỗi trong khi upload ảnh";
                    }
                }
            } else {
                // Handle the invalid file type
                $errors =  "Vui lòng chọn file có đuôi: JPG, JPEG, PNG, and GIF files are allowed.";
            }
            if (empty($errors)) {

                $name = $_POST['name'];
                $pet_id = $_POST['pet_id'];
                $quantity = $_POST['quantity'];
                $price = $_POST['price'];
                $cate_id = $_POST['cate_id'];
                $subcate_id = $_POST['sub_id'];
                $brand_id = $_POST['brand_id'];
                $sale = $_POST['sale'];
                $des = $_POST['des'];

                $result = $admin->addNewProduct(
                    $subcate_id,
                    $pet_id,
                    $name,
                    $brand_id,
                    $imageName,
                    $price,
                    $sale,
                    $des,
                    $quantity
                );
                if ($result == 1) {
                    $this->data['sub_content']['successAdd'] = true;
                } else {
                    $this->data['sub_content']['errorsAdd'] = "Thêm sản phẩm không thành công";
                }
            } else {
                $this->data['sub_content']['errorsAdd'] = $errors;
            }
        }
        $this->data['sub_content']['data_pets'] = $admin->getPets()->fetchAll();
        $this->data['sub_content']['data_brands'] = $admin->getBrands()->fetchAll();
        $this->data['sub_content']['data_categories'] = $products->getCategories()->fetchAll();
        $this->data['sub_content']['data_subCategory'] = $admin->getSubcate()->fetchAll();
        $this->link = "admin/products/addNewProduct";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
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
