<?php
class Checkout extends Controller
{
    public $data = [], $link = "checkout/index";
    public function __construct()
    {
        if (!isset($_SESSION['loggedID'])) {
            header("Location: /account");
        } else if (!isset($_SESSION['countCart']) || $_SESSION['countCart']['count'] == 0) {
            header("Location: /cart");
        }
    }

    public function index()
    {
        $this->data['sub_content']['product'] = "";
        $id_user = $_SESSION['loggedID'];
        $user = $this->model("UserModel");
        $cart = $this->model("CartModel");
        $info_user = $user->getUserById($id_user);
        if ($info_user != false) {
            $this->data['sub_content']['infoUser'] = $info_user;
        }
        $info_cart = $cart->getListCartItems($id_user);
        if ($info_cart != false) {
            $this->data['sub_content']['infoCart'] = $info_cart;
        }
        $allTotal = $cart->getAllTotalMoney($id_user);
        if ($allTotal != false) {
            $this->data['sub_content']['alltotal'] = $allTotal;
        }
        $ctm = $user->getInfoUserById($id_user);
        echo '<script type="text/javascript">localStorage.setItem("address", JSON.stringify({ province: "' . $ctm['province'] . '", district: "' . $ctm['district'] . '", ward: "' . $ctm['ward'] . '"}))</script>';
        $this->data['sub_content']['infomationUser'] = $ctm;
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
    public function confirm()
    {
        if (isset($_POST["checkoutSubmit"])) {
            $errors = [];
            $userInfo = [];

            $user = $this->model("UserModel");
            $cart = $this->model("CartModel");
            $checkout = $this->model("CheckoutModel");
            $id_user = $_SESSION['loggedID'];

            $info_user = $user->getUserById($id_user);
            if ($info_user != false) {
                $this->data['sub_content']['infoUser'] = $info_user;
            }
            // Info user
            $userInfo['id_customer'] = $id_user;
            $userInfo['fullname'] = $_POST["fullname"];
            $userInfo['email'] = $info_user['email'];
            $userInfo['phone'] = $_POST["phone"];
            $userInfo['province'] = $_POST["province-is"];
            $userInfo['district'] = $_POST['district-is'];
            $userInfo['ward'] = $_POST['ward-is'];
            $userInfo['street'] = $_POST['address'];
            $address = $_POST["province-is"] . '--' . $_POST['district-is'] . '--' . $_POST['ward-is'] . '--' . $_POST['address'];

            $user->updateInfoUser($userInfo);
            $date = date('Y-m-d H:i:s');
            // get cart
            $info_cart = $cart->getListCartItems($id_user);
            if ($info_cart != false) {
                $this->data['sub_content']['infoCart'] = $info_cart;
            }

            // get total
            $allTotal = $cart->getAllTotalMoney($id_user);
            if ($allTotal != false) {
                $this->data['sub_content']['alltotal'] = $allTotal;
            }

            // insert Order// process
            $list_cart = $info_cart->fetchAll();
            $result = $checkout->insertOrder($id_user, $allTotal['alltotal'], $date,  $address);
            if ($result != false) {
                $orderInfo = $checkout->getLastOrderId($id_user);
                foreach ($list_cart as $key => $item) {
                    $result = $checkout->insertOrderDetail($orderInfo['id'], $item['id_product'], $item['quantity'], $item['total'], $date);
                }
                if ($result != 1) {
                    $errors['insertOrderDetail'] = "Khong the thanh toan!. Vui long thu lai sau";
                    echo '<meta http-equiv="refresh" content="0;url= /checkout">';
                }
            } else {
                $errors['insertOrder'] = "Khong the thanh toan!. Vui long thu lai sau";
            }
            // end process

            if (!empty($errors)) {
                $this->data['sub_content']['orderErrors'] = $errors;
            } else {
                $this->data['sub_content']['successOrder'] = $checkout->completeOrder($id_user);
                $cart =  $this->model("CartModel");
                $_SESSION['countCart'] = $cart->getCountProductsInCart($_SESSION['loggedID']);
                $this->data['sub_content']['checkoutConfirmUser']  = $checkout->getInfoConfirmUser($id_user);
                $this->data['sub_content']['checkoutConfirmProducts']  = $checkout->getInfoConfirmProduct($orderInfo['id']);
            }
            $this->link = "checkout/orderConfirm";
            $this->data['content'] = $this->link; // đường dẫn tới file view
            // Render Views
            $this->render('layouts/client_layout', $this->data);
        } else {
            echo '<meta http-equiv="refresh" content="0;url= /checkout">';
        }
    }
}
