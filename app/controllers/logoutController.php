<?php


class logoutController
{


    public function __construct($route)
    {
        session_destroy();
        header("Location: /");
    }

}