<?php
class ShopCat extends Controller
{
    public $data = [], $link = "shopcat/index";

    public function index()
    {
        $products = $this->model("ProductModel");
        // // require_once.....
        // $products = new ProductModel();

        // $this->data['sub_content']['title'] = "Danh sach san pham";

        // $this->data['sub_content']['productsCatNoSale'] = $products ->getProductCatAllNoSale();
        $this->data['sub_content']['productsSaleCat'] = $products->getProductSaleCatAll();
        $this->data['sub_content']['productsCat'] = $products->getProductCatAll();


        $this->data['content'] =  $this->link; // đường dẫn tới file view

        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
    public function detail($id = "")
    {
        
        $products = $this->model("ProductModel");
        $id_pet = 2;
        if(!is_numeric($id)){
            return $this->render('../errors/404');  
        }
        $this->data['sub_content']['product'] = $products->getDetail($id_pet, $id);

        if(empty($this->data['sub_content']['product'])) {
      
           return $this->render('../errors/404');  
        } 
        $this->link = "shopcat/detail";
        $this->data['content'] = $this->link; //duong dan
        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }

    public function searchItem()
    {
        $products = $this->model("ProductModel");
        $this->data['sub_content']['data'] = "shopcat/index"; 

        if (isset($_POST['searchSubmit'])) {
            $seacrhTerm=$_POST['searchTerm'];
            $cate= $_POST['category'];
            $result= $products->getTimkiem($cate, $seacrhTerm);
            print_r($result);
        }
        $this->data['content'] = "shopcat/index"; //duong dan
        // Render Views

        $this->render('layouts/client_layout', $this->data);
    }
    // public function detail($id = 0)
    // {
    //     $products = $this->model("ProductModel");
    //     $this->data['sub_content']['info'] = $products->getDetail($id);
    //     $this->data['sub_content']['title'] = "Chi tiet san pham";
    //     $this->data['content'] = "products/detailProduct";
    //     $this->render('layouts/client_layout', $this->data);
    // }
}
