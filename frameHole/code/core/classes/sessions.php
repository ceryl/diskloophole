<?php
class sessions{

    static $loggedInVariables;

    public function __construct()
    {
        if (!isset($this::$loggedInVariables)) {

            if($_SESSION != ''){
                return false;
            }else{
                $this::$loggedInVariables = $_SESSION['profile'];
            }

            if (!$this::$loggedInVariables) {
                return false;
            }
        }

        return $this::$loggedInVariables;
    }
}