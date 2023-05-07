<?php
class Cart extends Controller
{
    public $data = [], $linkIndex = "cart/index";

    public function index()
    {
        if (isset($_SESSION['loggedID'])) {
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
        } else {
            echo header("Location: /account");
        }
    }
    public function updateCart()
    {
        if (isset($_SESSION['loggedID'])) {
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
        } else {
            echo header("Location: /account");
        }
    }
    public function deleteItem($id)
    {
        if (isset($_SESSION['loggedID'])) {
            $cart = $this->model('CartModel');
            $error = [];
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
        } else {
            echo header("Location: /account");
        }
    }
}
