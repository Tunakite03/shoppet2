<?php
class News extends Controller
{
    public $data = [], $linkIndex = "news/index";

    public function index()
    {
        $News = $this->model("NewsModel");
        // // require_once.....
        // $products = new ProductModel();

        // $this->data['sub_content']['title'] = "Danh sach san pham";

        // $this->data['sub_content']['productsCatNoSale'] = $products ->getProductCatAllNoSale();
        $this->data['sub_content']['News'] = $news->getAllNews();

        $this->data['content'] =  $this->linkIndex;; // đường dẫn tới file view

        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
}
