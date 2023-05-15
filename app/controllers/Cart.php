<?php
class Cart extends Controller
{
    public $data = [], $linkIndex = "cart/index";

    public function __construct()
    {
        if (!isset($_SESSION['loggedID'])) {
            echo header("Location: /account");
        }
        $cart =  $this->model("CartModel");
        $_SESSION['countCart'] = $cart->getCountProductsInCart($_SESSION['loggedID']);
    }
    public function index()
    {
        $cart = $this->model('CartModel');
        $errors = [];
        $idUser = $_SESSION['loggedID'];
        $this->data['sub_content']['products'] = "";
        $this->data['sub_content']['totalMoney'] = $cart->totalMoney($idUser);
        $this->data['sub_content']['errors'] = "";
        $this->data['sub_content']['success'] = "";
        $itemInCart = $cart->getListCartItems($idUser);

        $this->data['sub_content']['products'] = $itemInCart;
        $this->data['content'] = $this->linkIndex; // đường dẫn tới file view

        $this->render('layouts/client_layout', $this->data);
    }
    public function updateCart()
    {
        $cart = $this->model('CartModel');
        $errors = [];
        $idUser = $_SESSION['loggedID'];
        $this->data['sub_content']['product'] = "";
        $this->data['sub_content']['errors'] = "";
        $this->data['sub_content']['success'] = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateCart'])) {
            foreach ($_POST['quantity'] as $itemId => $quantity) {
                $errors[$itemId] =  $cart->updateCartItemQuantity($itemId, $quantity, $idUser);
                $errors[$itemId] =  $cart->updateCartTotal($itemId, $idUser);
            }
            if (!empty($errors)) {
                echo header("Location: /cart");
            } else {
                echo "<script>alert('Loi')</script>";
            }
        }
    }
    public function deleteItem($id)
    {
        $cart = $this->model('CartModel');
        $errors = [];
        $this->data['sub_content']['product'] = "";
        $this->data['sub_content']['errorsCart'] = "";
        $this->data['sub_content']['success'] = "";
        $idUser = $_SESSION['loggedID'];
        $result = $cart->deleteItem($id, $idUser);
        if ($result) {
            return header("Location: /cart");
        } else {
            $errors['failedDelete'] = "Không xóa được sản phẩm";
        }
        $this->data['sub_content']['errorsCart'] = $errors;
        $this->index();
    }
    public function addToCart($id = "", $quantity = 1)
    {
        $product = $this->model('ProductModel');
        $cart = $this->model("CartModel");
        $idUser = $_SESSION['loggedID'];
        $result = $product->getProductById($id);
        if (isset($_POST['quantity'])) {
            $quantity = intval($_POST['quantity']);
        }
        if (!is_numeric($quantity)) {
            $quantity = 1;
        }
        if ($result != false) {
            if ($cart->getProductInCart($id, $idUser) != false) {
                $productInCart = $cart->getProductInCart($id, $idUser);
                $result = $cart->updateCartItemQuantity($productInCart['id'], $productInCart['quantity'] + $quantity, $idUser);
                if ($result != false) {
                    $result = $cart->updateCartTotal($productInCart['id'], $idUser);
                    echo header("Location: /cart");
                }
            } else {
                $result = $cart->addToCart($id, $idUser, $quantity);
            }

            if ($result != false) {
                echo header("Location: /cart");
            }
        }
    }
}
