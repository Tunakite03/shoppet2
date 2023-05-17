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

    public function index($id = "")
    {
        $this->data['sub_content']['profile']="";
        $profile = $this->model("ProfileModel");
        if (!isset($_SESSION['loggedID']) || $id != $_SESSION['loggedID']) {

            return $this->render('../errors/404');
        }

        if (is_numeric($id)) {

            $this->data['sub_content']['profile'] = $profile->getCustomerInfoID($id);
        }

        
        $this->data['content'] = $this->link; // đường dẫn tới file view
        // Render Views
        $this->render('layouts/client_layout', $this->data);
    }
}
