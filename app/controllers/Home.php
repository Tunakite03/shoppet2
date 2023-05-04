<?php
class Home extends Controller
{
    public $model, $data = [], $linkIndex = "home/index";

    public function index()
    {
        $home = $this->model("ProductModel");

        $this->data['content'] = $this->linkIndex;
        $this->data['sub_content']['products'] = $home->getListProducts();

        $this->render('layouts/client_layout', $this->data);
    }
    public function detail($id = '', $slug = '')
    {
        echo "id san pham banwg :" . $id;
        echo "slug banwg " . $slug;
    }
    public function search($keyword = '')
    {
        echo "seacrh for:  " . $keyword;
    }
}
