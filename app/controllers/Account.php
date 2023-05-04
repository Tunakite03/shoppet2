<?php
class Account extends Controller
{
    public $data = [];
    public $linkIndex = "account/index";
    public function index()
    {
        $this->data['sub_content']['product'] = "";
        $this->data['content'] = $this->linkIndex; // đường dẫn tới file view

        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
}
