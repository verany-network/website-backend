<?php
class Controller {

    private $routes;
    private $route;
    private $controllerPath;
    private $className;

    public function __construct($route, $routes)
    {
        $this->routes = $routes;
        $this->route = $route;
        $this->controllerPath = ROOT_PATH. "/app/controllers/" . $this->route . "Controller.php";
        $tmp = explode("/", $this->route);
        $this->className = end($tmp)."Controller";
        $this->run();


    }

    protected function run() {
        $this->initController();
    }

    protected function initController() {
        if(file_exists($this->controllerPath)) {
            require_once ($this->controllerPath);
            $controllerr = new $this->className($this->route);
        } else {
            $this->__construct("main", array('main' => '/'));
        }
    }
}