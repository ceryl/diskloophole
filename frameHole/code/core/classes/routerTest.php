<?php
class routerTest{
    private $route;

    function __construct(){
        $this->routes = $GLOBALS["config"]["routes"];
        $route = $this->findRoute();
        if(class_exists($route["controller"]))
        {
            $controller = new $route["controller"]();
            if(method_exists($controller, $route["method"]))
            {
                $controller->{$route["method"]}();
            }else{
                errorClass::show(404);
            }
        }else{
            errorClass::show(404);
        }
    }

    private function routePart($route){
        if(is_array($route))
        {
            $route = $route["url"];
        }
        $parts = explode("/", $route);
        return $parts;
    }

    static function uri($part){
        $parts = explode("/", $_SERVER["REQUEST_URI"]);
        if($parts[1] == $GLOBALS["config"]["path"]["index"])
        {
            $part++;
        }
        return(isset($parts[$part])) ? $parts[$part] : "";
    }

    static function getUri(){
        $parts = explode("/", $_SERVER["REQUEST_URI"]);
        if($parts){
            return $parts;
        }else{
            return null;
        }
    }

    static function getMethod()
    {
        $uri = self::getUri();
        $arr = array_slice($uri, 2, 1);
        $method = json_encode($arr);
        return $method;
    }

    static function getFunction()
    {
        $uri = self::getUri();
        $arr = array_slice($uri, 3, 1);
        $function = json_encode($arr);
        return $function;
    }

    private function findRoute(){
        foreach ($this->routes as $route) {
            $parts = $this->routePart($route);
            $allMatch = true;
            foreach ($parts as $key => $value) {
                if ($value != "*") {
                    if(router::uri($key) != $value) {
                        $allMatch = false;
                    }
                }
            }
            if($allMatch) {
                return $route;
            }
        }
        $uri_1 = routerTest::uri(2);
        $uri_2 = routerTest::uri(3);
        if($uri_1 == "") {
            $uri_1 = $GLOBALS["config"]["defaults"]["controller"];
        }
        if($uri_2 == "") {
            $uri_2 = $GLOBALS["config"]["defaults"]["method"];
        }
        $route = array(
            "controller" => $uri_1,
            "method" => $uri_2
        );
        return $route;
    }

}