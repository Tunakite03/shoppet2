<?php

class App
{
    private $__controller, $__action, $__params, $__db;


    function __construct()
    {
        $this->__db = new ConnectDB();
        $this->__controller = "home";
        $this->__action = "index";
        $this->__params = [];
        $this->handlerUrl();
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
        } else {
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
