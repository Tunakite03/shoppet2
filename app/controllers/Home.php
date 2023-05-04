<?php
class Home extends Controller
{
    public $model, $data = [], $linkIndex = "home/index";

    public function index()
    {
        $home = $this->model("ProductModel");
        // new ProductModel(), require....

        $this->data['content'] = $this->linkIndex;
        $this->data['sub_content']['products'] = $home->getListProducts();
        $this->data['sub_content']['product_new_dog'] = $home->getListProductNew_Dog();
        $this->data['sub_content']['product_new_cat'] = $home->getListProductNew_Cat();
        $this->data['sub_content']['product_trend_dog'] = $home->getListProductTrend_Dog();
        $this->data['sub_content']['product_trend_cat'] = $home->getListProductTrend_Cat();
   
        
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
