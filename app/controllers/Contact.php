<?php
class Contact extends Controller
{
    public $data = [], $linkIndex = "contact/index";

    public function index()
    {
        $this->data['sub_content']['product'] = ""; //duw lieu tra ve tu database

        $this->data['content'] = $this->linkIndex; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
}
