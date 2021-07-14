<?php

class builderController
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

        if(isset($_SESSION['apply']['builder']['status'])) {
            if(!$db->open_apply($_SESSION['profile']['uuid'])) {
                if($_SESSION['apply']['builder']['status'] == "application") {

                    if(isset($_POST['application_button'])){
                        if(!$db->open_apply($_SESSION['profile']['uuid'])) {
                            if(isset($_POST['firstName'], $_POST['lastName'], $_POST['portfolioLink'], $_POST['desiredArea1'], $_POST['desiredArea2'], $_POST[''], $_POST[''], $_POST[''])) {

                            }
                        } else {
                            $this->render_requirements();
                        }
                    } else {
                        $this->render_application();
                    }
                } elseif($_SESSION['apply']['builder']['status'] == "contacts"){

                }  else {
                    $this->render_requirements();
                }
            } else {
                $this->render_requirements();
            }
        } elseif(isset($_POST['requirements_button'])) {
            if(!$db->open_apply($_SESSION['profile']['uuid'])) {
                $_SESSION['apply']['builder']['status'] = "application";
                $this->render_application();
            } else {
                $this->render_requirements();
            }
        } else {
            $this->render_requirements();
        }
    }

    public function __construct($route)
    {
        $this->route = $route;

        $this->viewPath['requirements'] = ROOT_PATH . "/app/views/" . $this->route . "/requirements.phtml";
        $this->viewPath['application'] = ROOT_PATH . "/app/views/" . $this->route . "/application.phtml";
        $this->viewPath['contacts'] = ROOT_PATH . "/app/views/" . $this->route . "/contacts.phtml";
        $tmp = explode("/", $this->route);
        $this->className = end($tmp) . "Controller";
        $this->enable();
    }

    private function render_requirements()
    {
        ob_start();
        require_once($this->viewPath['requirements']);
        $view = ob_get_contents();
        ob_get_clean();
        echo $view;
    }
    private function render_application()
    {
        ob_start();
        require_once($this->viewPath['application']);
        $view = ob_get_contents();
        ob_get_clean();
        echo $view;
    }
    private function render_contacts()
    {
        ob_start();
        require_once($this->viewPath['contacts']);
        $view = ob_get_contents();
        ob_get_clean();
        echo $view;
    }
}