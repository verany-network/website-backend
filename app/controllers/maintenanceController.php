<?php


class maintenanceController
{
    private $route;
    private $viewPath;
    private $className;

    //Immer Ausgeführt
    private function enable()
    {
        $db = new database();
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