<?php
class ShopDog extends Controller
{
    public $data = [], $link = "shopdog/index";

    public function index()
    { 
        $id_pet=1;
        $products = $this->model("ProductModel");
        // // require_once.....
        // $products = new ProductModel();
        // $this->data['sub_content']['title'] = "Danh sach san pham";
        // $this->data['sub_content']['productsDogNoSale'] = $products ->getProductDogAllNoSale();
        $this->data['sub_content']['categories'] = $products->getCategories();
        $this->data['sub_content']['productsSaleDog'] = $products->getProductSaleDogAll();
        $this->data['sub_content']['productsDog'] = $products->getProductAll($id_pet);
        $this->data['sub_content']['CountDog'] = $products->getCountProduct($id_pet);



        $this->data['content'] =  $this->link;; // đường dẫn tới file view


        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }


    public function detail($id = "")
    {

        $products = $this->model("ProductModel");
        $id_pet = 1;
        if (!is_numeric($id)) {
            return $this->render('../errors/404');
        }
        $this->data['sub_content']['product'] = $products->getDetail($id_pet, $id);

        if (empty($this->data['sub_content']['product'])) {

            return $this->render('../errors/404');
        }
        $this->link = "shopdog/detail";
        $this->data['content'] = $this->link; //duong dan
        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
    public function categories($id = '')
    {
        $products = $this->model("ProductModel");

        $this->data['sub_content']['productsDog'] = $products->getProductAll();
        $this->data['sub_content']['productsSaleDog'] = $products->getProductSaleDogAll();

        $this->data['content'] =  $this->link;; // đường dẫn tới file view
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
            $idPet = 1;
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
