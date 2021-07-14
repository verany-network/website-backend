<?php


class loginController{
    private $route;
    private $viewPath;
    private $className;

    //Immer Ausgeführt
    private function enable()
    {
        $db = new database();
        if(isset($_POST['username'], $_POST['password'])) {
            $password = trim($_POST['password']);
            $username = trim($_POST['username']);
            if(!$db->loginFilter($username) == false) {
                $user = $db->loginFilter($username);
                if (password_verify($password, $user['password'])) {
                    $_SESSION['login']['is_login'] = true;
                    $_SESSION['profile']['email'] = $user['email'];
                    $_SESSION['profile']['uuid'] = $user['uuid'];
                    $_SESSION['profile']['username'] = $db->returnUsername($user['uuid']);
                    header("Location: /");
                }
            }
        }
    }
    public function __construct($route)
    {
        $this->route = $route;
        $this->viewPath = ROOT_PATH . "/app/views/" . $this->route . ".phtml";
        $tmp = explode("/", $this->route);
        $this->className = end($tmp) . "Controller";
        $this->render();
    }

    private function render()
    {
        ob_start();
        $this->enable();
        require_once($this->viewPath);
        $view = ob_get_contents();
        ob_get_clean();
        echo $view;
    }

}