<?php
class ShopCat extends Controller
{
    public $data = [], $linkIndex = "shopcat/index";

    public function index()
    {
        $products = $this->model("ProductModel");
        // // require_once.....
        // $this->data['sub_content']['productsCatNoSale'] = $products ->getProductCatAllNoSale();

        $this->data['sub_content']['categories'] = $products->getCategories();
        $this->data['sub_content']['productsSaleCat'] = $products->getProductSaleCatAll();
        $this->data['sub_content']['productsCat'] = $products->getProductCatAll();

        $this->data['content'] =  $this->linkIndex; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }

    public function detail($id = "")
    {
        $products = $this->model("ProductModel");

        $this->data['sub_content']['productsCat'] = $products->getProductCatAll();
        $this->data['sub_content']['title'] = $id;

        $this->data['content'] = "shopcat/detail"; //duong dan
        // Render Views

        $this->render('layouts/client_layout', $this->data);
    }


    public function searchItem()
    {
        $products = $this->model("ProductModel");
        $this->data['sub_content']['categories'] = $products->getCategories();

        if (isset($_POST['searchSubmit'])) {
            $seacrhTerm = $_POST['searchTerm'];
            $cate = $_POST['category'];
            $idPet = 2;
            if ($cate == "name") {
                $result = $products->getSearchItemName($seacrhTerm, $idPet);
            } else {
                $result = $products->getSearchItemBrand($seacrhTerm, $idPet);
            }
            $this->data['sub_content']['productsCat'] = $result;
        } else {
            echo header("Location: /shopcat");
        }
        $this->data['content'] = "shopcat/index"; //duong dan
        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
}
