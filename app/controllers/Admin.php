<?php
class Admin extends Controller
{
    public $data = [], $link = "admin/dashboard";

    public function __construct()
    {
        if (!isset($_SESSION['adminLogged']) || empty($_SESSION['adminLogged'])) {
            header("Location: /adminlogin");
        }
    }
    public function logout()
    {
        unset($_SESSION['adminLogged']);
        header("Location: /adminlogin");
    }

    public function index()
    {
        $con = "year";
        $value = date('Y');
        if (isset($_GET['submitChart'])) {
            $con = $_GET['select_con'];
            $value = $_GET['data'];
        }
        $checkout = $this->model("CheckoutModel");
        $product = $this->model("ProductModel");

        $this->data['sub_content']['data_chart'] = $checkout->getListOrder($con, $value);
        $this->data['sub_content']['data_circle_chart'] = $checkout->getMoneyByYear();
        $this->data['sub_content']['data_products_best_sale'] = $product->getProductsBestSale();
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
    public function listproducts()
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
                                    $result = $admin->editImageProduct($id, $newName);
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
                $errors = "Vui lòng chọn file có đuôi: JPG, JPEG, PNG, and GIF files are allowed.";
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

    public function listnews()
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

    public function listcustomers()
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
        if (isset($_POST['editusersubmit'])) {
            $name = $_POST['name'];
            // Sanitize and validate the form data
            $province = $_POST['province-is'];
            $district = $_POST['district-is'];
            $ward = $_POST['ward-is'];
            $street = $_POST['street-is'];
            $phone = $_POST['phone'];
            $result = $customer->UpdateCustomer($id, $name,  $phone, $province, $district, $ward, $street);
            if ($result == 1) {
                $this->data['sub_content']['successEdit'] = true;
            } else {
                $this->data['sub_content']['errorsEdit'] = "Bạn chưa thao tác gì cả";
            }
        }
        $ctm = $customer->getInfoUserById($id);
        $this->data['sub_content']['data_customer'] = $ctm;
        echo '<script type="text/javascript">localStorage.setItem("address", JSON.stringify({ province: "' . $ctm['province'] . '", district: "' . $ctm['district'] . '", ward: "' . $ctm['ward'] . '"}))</script>';
        $this->link = "admin/customers/editCustomers";
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

    public function listcategories()
    {
        $this->data['sub_content']['product'] = "";
        $categories = $this->model("ProductModel");
        $this->data['sub_content']['data_categories'] = $categories->getCategoriesInfo();
        $this->link = "admin/categories/listCategories";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }


    public function listAdmin()
    {
        $id_admin = $_SESSION['adminLogged']['id'];
        $admin = $this->model("AdminModel");
        $this->data['sub_content']['data_admin'] = $admin->getListAdmin($id_admin);
        $this->link = "admin/auth/listAdmin";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
    public function editadmin($id = '')
    {
        if (is_numeric($id) && $id != $_SESSION['adminLogged']['id']) {
            $admin = $this->model("AdminModel");
            $this->data['sub_content']['data_admin'] = $admin->getInfoAdmin($id);
            $this->data['sub_content']['data_role'] = $admin->getListRole();

            $this->link = "admin/auth/editAdmin";
            $this->data['content'] = $this->link; // đường dẫn tới file view
            // Render Views
            $this->render('layouts/admin_layout', $this->data);
        } else {
            header("Location: /admin/listAdmin");
        }
    }
    public function addAdmin()
    {
        $admin = $this->model("AdminModel");

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registerSubmit'])) {
            $errors = [];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $checkExistEmail = $admin->getAdmin($email);
            if ($checkExistEmail != false) {
                $errors['existAdmin'] = 'Email đã tồn tại';
            } else {
                $result = $admin->insertAdmin($name, $email, $password, $role);
                if ($result == 1) {
                    $this->data['sub_content']['successRegister'] = true;
                } else {
                    $errors['failedResgister'] = "Thêm không thành công vui lòng thử lại sau";
                }
            }
            if (!empty($errors)) {
                $this->data['sub_content']['errorsRegister'] = $errors;
            }
        }
        $this->data['sub_content']['data_role'] = $admin->getListRole();
        $this->link = "admin/auth/addAdmin";
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/admin_layout', $this->data);
    }
    public function deleteAdmin($id)
    {
        if (is_numeric($id)) {
            $admin = $this->model("AdminModel");

            $result = $admin->deleteAdmin($id);
            if ($result == 1) {
                $this->data['sub_content']["successDelete"] = true;
            } else {
                $this->data['sub_content']['errorsDelete'] = "Không thể xóa lúc này vui lòng thử lại sau";
            }
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {
            header("Location: /admin/categories");
        }
    }

    public function deleteSubCate($id = "")
    {
        if (is_numeric($id)) {
            $admin = $this->model("AdminModel");
            $admin->updateTypeProductToNull($id);
            $result =  $admin->deleteSubcategory($id);
            if ($result == 1) {
                $this->data['sub_content']["successDelete"] = true;
            } else {
                $this->data['sub_content']['errorsDelete'] = "Không thể xóa lúc này vui lòng thử lại sau";
            }
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            header("Location: /admin/categories");
        }
    }
    public function editcategory($id = "")
    {
        if (is_numeric($id)) {
            $admin = $this->model("AdminModel");
            $this->data['sub_content']['errorsEdit'] = "";
            $this->data['sub_content']['successEdit'] = "";

            if (isset($_POST['editCategorySubmit'])) {

                $nameCate = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                try {
                    // Update the name of the category
                    $admin->updateNameCategory($id, $nameCate);
                    $this->data['sub_content']['successEdit'] .= "Thay đổi tên danh mục thành công" . "\n";
                    if (isset($_POST['subcatenew'])) {
                        $subcate = filter_input(INPUT_POST, 'subcatenew', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                        // Insert the new subcategories
                        foreach ($subcate as $key => $subcate_name) {
                            if ($admin->checkNameSubcateExist($id, $subcate_name) == false) {
                                $result = $admin->insertSubcategory($id, $subcate_name);
                                $this->data['sub_content']['successEdit'] .= "Thêm danh mục con " . $subcate_name . " thành công.";
                            } else {
                                $this->data['sub_content']['errorsEdit'] .= "Khong thể thêm danh mục con " . $subcate_name;
                            }
                        }
                    }
                    // Set success message if the update was successful
                } catch (Exception $e) {
                    // Set error message if there was an error
                    $this->data['sub_content']['errorsEdit'] = true;
                }
            }
            $this->data['sub_content']['data_category'] = $admin->getCategoryByID($id);
            $this->link = "admin/categories/editcategory";
            $this->data['content'] = $this->link; // đường dẫn tới file view
            $this->render('layouts/admin_layout', $this->data);
        } else {
            header("Location: /admin/categories");
        }
    }
}
