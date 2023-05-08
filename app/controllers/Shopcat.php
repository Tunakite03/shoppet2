<?php
class ShopCat extends Controller
{
    public $data = [], $link = "shopcat/index";
    public function index()
    {
        $id_pet=2;
        $products = $this->model("ProductModel");
        // // require_once.....
        // $this->data['sub_content']['productsCatNoSale'] = $products ->getProductCatAllNoSale();
        $this->data['sub_content']['categories'] = $products->getCategories();
        $this->data['sub_content']['productsSaleCat'] = $products->getProductSaleCatAll();
        $this->data['sub_content']['productsCat'] = $products->getProductAll($id_pet);
        $this->data['sub_content']['CountCat'] = $products->getCountProduct($id_pet);
        
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
