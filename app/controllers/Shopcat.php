<?php
class ShopCat extends Controller
{
    public $data = [], $link = "shopcat/index";
    public function __construct()
    {
        $this->data['sub_content']['productsPerPage'] = 9;

        if (isset($_GET['page']) && $_GET['page'] > 0) {
            $this->data['sub_content']['currentPage'] = (int)$_GET['page'];
            $this->data['sub_content']['from'] = ($this->data['sub_content']['currentPage'] - 1) * $this->data['sub_content']['productsPerPage'];
        } else {
            $this->data['sub_content']['currentPage'] = 1;
            $this->data['sub_content']['from'] = 0;
        }
    }
    public function index()
    {
        $products = $this->model("ProductModel");
        // // require_once.....
        // $this->data['sub_content']['productsCatNoSale'] = $products ->getProductCatAllNoSale();

        $this->data['sub_content']['categories'] = $products->getCategories();
        $this->data['sub_content']['productsSaleCat'] = $products->getProductSaleCatAll();
        $this->data['sub_content']['productsCat'] = $products->getProductCatAll();
        $this->data['sub_content']['type'] = $products->getType();


        $this->data['content'] =  $this->link; // đường dẫn tới file view

        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
    public function filter()
    {
        $products = $this->model("ProductModel");
        // Add filter item section
        if (isset($_POST['minPrice']) && isset($_POST['maxPrice'])) {
            $minPrice = $_POST['minPrice'];
            $maxPrice = $_POST['maxPrice'];
            $selectedPrice = $_POST['select_price'];
            $data = $products->getListProductsByPrice1(2, $minPrice, $maxPrice, $selectedPrice);
            $totalProducts = $data->rowCount();
            if ($totalProducts > 0) {
                $output = 'row';
                $output = '<div class="filter-item">';
                $output .= '<div class="row justify-content-center">';
                $output .= '<div class="col-12 text-center">';
                $output .= '<div class="filter-found">';
                $output .= '<h6>Có <span>' . $totalProducts . '</span> sản phẩm</h6>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '<div class="col-lg-4 col-md-3">';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                foreach ($data as $product) {
                    $output .= '<div class="col-lg-4 col-md-6 col-sm-6 product-container">';
                    $output .= '<div class="product-item">';
                    $output .= '<div class="product-item-pic set-bg">';
                    $output .= '<img src="' . _WEB_ROOT . '/public/assets/img/img_pet/' . $product['image'] . '" alt="" width="100%">';
                    $output .= '<ul class="product__item__pic__hover">';
                    $output .= '<li><a href="#"><i class="fa fa-heart"></i></a></li>';
                    $output .= '<li><a href="#"><i class="fa fa-retweet"></i></a></li>';
                    $output .= '<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>';
                    $output .= '</ul>';
                    $output .= '</div>';
                    $output .= '<div class="product-item-text">';
                    $output .= '<h6><a href="' . _WEB_ROOT . '/shopdog/detail/' . $product['id'] . '"><span>' . $product['name'] . '</span></a></h6>';
                    if ($product['price'] > $product['sale'] && $product['sale'] == 0) {
                        $output .= '<h5 style="color:red;">' . number_format($product['price']) . '<sup><u>đ</u></sup></br></h5>';
                    } else {
                        $output .= '<h5><font color="red">' . number_format($product['sale']) . '<sup><u>đ</u></sup></font><strike>' . number_format($product['price']) . '</strike><sup><u>đ</u></sup></br></h5>';
                    }
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                }
            } else {
                $output = "Không có sản phẩm";
            }
            echo  $output;
        }
        // Render Views
    }
    public function detail($id = "")
    {

        $products = $this->model("ProductModel");
        $id_pet = 2;
        if (!is_numeric($id)) {
            return $this->render('../errors/404');
        }
        $this->data['sub_content']['product'] = $products->getDetail($id_pet, $id);

        if (empty($this->data['sub_content']['product'])) {

            return $this->render('../errors/404');
        }
        $this->link = "shopcat/detail";
        $this->data['content'] = $this->link; //duong dan
        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }



    public function category($name_cate = '', $name_type = '')
    {
        $products = $this->model("ProductModel");
        $id_pet = 2;
        $this->data['sub_content']['categories'] = $products->getCategories();
        $this->data['sub_content']['type'] = $products->getType();

        if (empty($name_type)) {
            $result = $products->getProductCate($id_pet, $name_cate);
        } else {
            $result = $products->getProductType($id_pet, $name_cate, $name_type);
        }

        $this->data['sub_content']['productsCat'] = $result;


        $this->data['content'] = "shopcat/index"; //duong dan
        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
}
