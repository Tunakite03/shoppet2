<?php
class Shopcat extends Controller
{
    public $data = [];

    public function index()
    {
        $products = $this->model("ProductModel");
        // // require_once.....
        // $products = new ProductModel();

        // $this->data['sub_content']['title'] = "Danh sach san pham";

        $this->data['sub_content']['product'] = "heeloooo";

        $this->data['content'] = "shopdog/products"; // đường dẫn tới file view

        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
    public function detail($id = "")
    {
        $this->data['sub_content']['title'] =$id ;
    
        $this->data['content'] = "shopdog/detail"; //duong dan
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
