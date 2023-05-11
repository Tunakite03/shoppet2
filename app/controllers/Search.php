<?php
class Search extends Controller
{
    public $data = [], $link = "search/index";

    public function __construct()
    {
        $this->data['sub_content']['productsPerPage'] = 9;

        if (isset($_GET['page']) && $_GET['page'] > 0) {
            $this->data['sub_content']['currentPage'] = (int)$_GET['page'];
            $this->data['sub_content']['from'] = ($this->data['sub_content']['currentPage'] - 1) * $this->data['sub_content']['productsPerPage'];
        } else {
            $this->data['sub_content']['currentPage'] = 1;
            $this->data['sub_content']['from'] = 0;
        }
    }

   
    public function index($table = '', $key = '')
    {
        $search = $this->model("SearchModel");

        if (!empty($_GET['table']) && !empty($_GET['key'])) {
            $table = $_GET['table'];
            $key = $_GET['key'];
        }
        ;

        $this->data['sub_content']['result_search'] = $search->getListSearch($table, $key);
        $this->data['content'] = $this->link; // đường dẫn tới file view

        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }



}