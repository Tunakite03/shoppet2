<?php
class Home extends Controller
{
    public $model, $data = [];

    public function index()
    {
        $home = $this->model("HomeModel");

        $this->data['sub_content']['title'] = "Home";
        $this->data['sub_content']['list'] = $home->getListHome();
        $this->data['content'] = "home/index";
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
