<?php
    class modelCred{
        public $model;

        function __construct()
        {
            $this->model = new databaseCon($GLOBALS["config"]["database"]["host"],
                $GLOBALS["config"]["database"]["username"],
                $GLOBALS["config"]["database"]["password"],
                $GLOBALS["config"]["database"]["name"]);
        }
    }