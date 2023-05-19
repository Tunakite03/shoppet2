<?php
class News extends Controller
{
    public $data = [], $link = "news/index";

    public function index()
    {
        $news = $this->model("NewsModel");
        // // require_once.....
        // $products = new ProductModel();

        // $this->data['sub_content']['title'] = "Danh sach san pham";

        // $this->data['sub_content']['productsCatNoSale'] = $products ->getProductCatAllNoSale();
        $this->data['sub_content']['News'] = $news->getAllNews();

        $this->data['content'] =  $this->link;; // đường dẫn tới file view

        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
    public function detail($id = '')
    {
        $News = $this->model("NewsModel");
        $this->data['sub_content']['NewsId'] = $News->getNewsId($id);
        $this->link = "news/detail";
        $this->data['content'] =  $this->link;; // đường dẫn tới file view

        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
}
