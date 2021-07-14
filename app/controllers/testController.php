<?php


class testController
{
    private $route;
    private $viewPath;
    private $className;


    //Immer Ausgeführt
    private function enable()
    {
        $db = new database();

        foreach ($db->getUserbyGroup("Administrator") as $user ) {
            echo $user['uuid'];
            echo "<br>";
            echo $db->returnUsername($user['uuid']);
            echo "<br>";
        }

        foreach ($db->getUserbyGroup("Senior-Developer") as $user ) {
            echo $user['uuid'];
            echo "<br>";
            echo $db->returnUsername($user['uuid']);
            echo "<br>";
        }

        foreach ($db->getUserbyGroup("Developer") as $user ) {
            echo $user['uuid'];
            echo "<br>";
            echo $db->returnUsername($user['uuid']);
            echo "<br>";
        }

        foreach ($db->getUserbyGroup("Test-Developer") as $user ) {
            echo $user['uuid'];
            echo "<br>";
            echo $db->returnUsername($user['uuid']);
            echo "<br>";
        }

        foreach ($db->getUserbyGroup("SrModerator") as $user ) {
            echo $user['uuid'];
            echo "<br>";
            echo $db->returnUsername($user['uuid']);
            echo "<br>";
        }

        foreach ($db->getUserbyGroup("Moderator") as $user ) {
            echo $user['uuid'];
            echo "<br>";
            echo $db->returnUsername($user['uuid']);
            echo "<br>";
        }

        foreach ($db->getUserbyGroup("Supporter") as $user ) {
            echo $user['uuid'];
            echo "<br>";
            echo $db->returnUsername($user['uuid']);
            echo "<br>";
        }

        foreach ($db->getUserbyGroup("Helper") as $user ) {
            echo $user['uuid'];
            echo "<br>";
            echo $db->returnUsername($user['uuid']);
            echo "<br>";
        }


        /*$first_component = ["text" => "first "];
        $second_component = ["text" => "second ", "color" => "red", ""];
        $third_component = ["text" => "third ", "strikethrough" => true];
        $json = ["extra" => [$first_component, $second_component, $third_component]];*/

        //echo  MinecraftJsonColors::convertToLegacy($json);
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
        //require_once($this->viewPath);
        $view = ob_get_contents();
        ob_get_clean();
        echo $view;
    }



}