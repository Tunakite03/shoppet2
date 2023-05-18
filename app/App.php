<?php

class App
{
    private $__controller, $__action, $__params, $__db, $__admin_id;
    function __construct()
    {
        $this->__db = new ConnectDB();
        $this->__controller = "home";
        $this->__action = "index";
        $this->__params = [];
        $this->__admin_id = isset($_SESSION['id_role']) ? $_SESSION['id_role']  : null;
        $this->handlerUrl();
    }

    public function checkRole()
    {
        $roleID =  $this->__admin_id;
        switch ($roleID) {
            case '1':
                return true;
            case '2':
                if (strpos($this->__action, 'admin')) {
                    // Prevent editing for Editor role on the Admin page
                    return false;
                }
                break;
            case '3':
                if ((strpos($this->__action, 'admin') !== false)) {
                    // Prevent editing for Editor role on the Admin page
                    return false;
                }
                break;
            case '4':
                if ((strpos($this->__action, 'admin') !== false  || strpos($this->__action, 'cate') != false || strpos($this->__action, 'product') != false || strpos($this->__action, 'order') !== false || strpos($this->__action, 'customer') !== false)) {
                    // Prevent editing for Editor role on the Admin page
                    return false;
                }
                break;
            case '5':
                if ((strpos($this->__action, 'logout') != "" || strpos($this->__action, 'index') != "" || strpos($this->__action, 'list') != "") && strpos($this->__action, 'listadmin') == "") {
                    // Prevent editing for Editor role on the Admin page
                    return true;
                } else {
                    return false;
                }
            case '6':
                if ((strpos($this->__action, 'logout') != "" || strpos($this->__action, 'index') != "")) {
                    // Prevent editing for Editor role on the Admin page
                    return true;
                } else {
                    return false;
                }
            default:
                return false;
        }

        return true; // Default to allowing access if no restrictions apply
    }

    function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }
    public function handlerUrl()
    {
        $url = $this->getUrl();
        $urlArr = array_filter(explode('/', $url));
        $urlArr = array_values($urlArr);

        // Xu li controller
        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
            $controller = strtolower($urlArr[0]);
        } else {
            $controller = "home";
            $this->__controller = ucfirst($this->__controller);
        }
        if (file_exists("app/controllers/" . ($this->__controller) . ".php")) {

            require_once "app/controllers/" . ($this->__controller) . ".php";

            if (class_exists($this->__controller)) {
                $this->__controller  = new $this->__controller();
                unset($urlArr[0]);
            } else {
                $this->loadError();
                return;
            }
        } else {
            $this->loadError();
            // Kết thúc function nếu _controller không tìm thấy 
            return;
        }

        // Xu ly action
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }
        // Xu ly params
        if (!empty($urlArr[2])) {
            $this->__params = array_values($urlArr);
        }
        if (method_exists($this->__controller, $this->__action)) {
            if ($controller == "admin" && $this->checkRole() == false) {
                $this->loadError(403);
                die;
            }
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        } else {
            $this->loadError();
        }
    }

    public function loadError($name = "404")
    {
        require_once "./app/errors/" . $name . ".php";
    }
}
