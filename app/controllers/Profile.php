<?php
class Profile extends Controller
{
    public $data = [], $link = "profile/index";
    public function __construct()
    {
        // if (isset($_SESSION['loggedID'])) {
        //     header("Location: /");
        // }
    }

    public function index($id="")
    {
     
        $profile = $this->model("ProfileModel");

        $this->data['sub_content']['profile'] = $profile->getCustomerInfoID($id); //duw lieu tra ve tu database

        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
}
