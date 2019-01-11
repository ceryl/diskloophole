<?php
    /**
     * loading everything
     */
    spl_autoload_register(function ($class){
        $instantiable = false;

        $appPath = $GLOBALS["config"]["path"]["app"];
        $corePath = $GLOBALS["config"]["path"]["core"];
        $libPath = $GLOBALS["config"]["path"]["libs"];
        if(file_exists("{$corePath}classes/{$class}.php")) {
            $instantiable = true;
            require "{$corePath}classes/{$class}.php";
        }else if(file_exists("{$appPath}controllers/{$class}.php")) {
            $instantiable = true;
            require_once "{$appPath}controllers/{$class}.php";
        }else if(file_exists( "{$libPath}{$class}.php")){
            $instantiable = true;
            require_once "{$libPath}/{$class}.php";
        }

        if($instantiable){
            foreach ($GLOBALS["instances"] as $instance){
                $instance->$class = new $class();
            }
        }
    });