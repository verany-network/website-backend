<?php
class Router {
    public function run($routes) {
        if($this->findRoute($routes)) {
            $this->initController($this->findRoute($routes), $routes);
        } elseif ($this->findRouteKey($routes)){
            $this->initController($this->findRouteKey($routes), $routes);

        } else{
            $this->initController("main", $routes);
        }
    }
    private function findRoute($routes) {
        foreach ($routes as $key => $route) {
            if($this->_getUri() == $route) {
                $found = true;
            } elseif ($this->_getUri() . "/" == $route) {
                $found = true;
            } elseif (substr($this->_getUri(), 0, -1) == $route) {
                $found = true;
            } else {
                $found = false;
            }
            if($found) {
                if($key[0] == "#") {
                    return false;
                } else {
                    return $key;
                }

            }
        }
    }

    private function findRouteKey($routes) {
        foreach ($routes as $key => $route) {
            if($key[0] == "#") {
                $url = $this->_getUri();
                $keylength = strlen($key);
                $urlcut = substr($url, 0, $keylength);
                if ($urlcut == $route){
                    $found = true;
                } else {
                    $found = false;
                }
            } else {
                $found = false;
            }
            if($found) {
                if(substr($this->_getUri(), strlen($key) + 3) == "" || substr($this->_getUri(), strlen($key) + 3) == "/") {
                    return false;
                } else {
                    return substr($key, 1);
                }
            }
        }
    }

    protected function initController($route, $routes){
        $controller = new Controller($route, $routes);
    }
    protected function _getUri()
    {
        $uri = $_SERVER['REQUEST_URI'];
        return $uri;
    }
}