<?php
class applyController
{

    private $route;
    private $viewPath;
    private $className;
    protected $servers;

    private $SignUp = false;
    private $SignIn = false;

    //Immer Ausgeführt
    private function enable()
    {
        $db = new database();
        if(isset($_POST['reg_email'], $_POST['reg_password'], $_POST['reg_key'])) {
            if(strlen($_POST['reg_key']) == 16) {
                $password = trim($_POST['reg_password']);
                $email = trim($_POST['reg_email']);
                $key = $_POST['reg_key'];
                if(strlen($password) >=8) {
                    if(!$db->verifikationKeyexistandisvalid($key) == false) {
                        if(!$db->userexistcheck($db->verifikationKeyexistandisvalid($key))){
                            //Send E-Mail
                            $db->incnewuser($db->verifikationKeyexistandisvalid($key), password_hash($password, PASSWORD_DEFAULT), $email);
                            $db->setwebverifyisused($db->verifikationKeyexistandisvalid($key));
                        } else {$this->SignUp = true;}
                    } else {$this->SignUp = true;}
                } else {$this->SignUp = true;}
            } else {$this->SignUp = true;}
        }
        if(isset($_POST['log_username'], $_POST['log_password'])) {
            $password = trim($_POST['log_password']);
            $username = trim($_POST['log_username']);
            if(!$db->loginFilter($username) == false) {
                $user = $db->loginFilter($username);
                if (password_verify($password, $user['password'])) {
                    $_SESSION['login']['is_login'] = true;
                    $_SESSION['profile']['email'] = $user['email'];
                    $_SESSION['profile']['uuid'] = $user['uuid'];
                    $_SESSION['profile']['username'] = $db->returnUsername($user['uuid']);
                    header("Location: ".$_SERVER['REQUEST_URI']);
                } else {$this->SignIn = true;}
            } else {$this->SignIn = true;}
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