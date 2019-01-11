<?php
//some error messages
error_reporting(E_ALL);
ini_set("display_errors", 1);

//start session
session_start();
$_SESSION["nuclear_weapon_key"] = "lolva";
//var_dump($_SESSION);

//set globals
$GLOBALS["config"] = array(
    "appName" => "testFrame",
    "version" => "0.0.1",
    "domain"  => "diskloophole.nl/testFrame/",
    "path" => array(
        "app" => "code/app/",
        "core" => "code/core/",
        "index" => "index.php",
        "images" => "images/",
        "libs" => "lib/"
    ),
    "defaults" => array(
        "controller" => "main",
        "method" => "index"
    ),
    "routes" => array(),
    "database" => array(
        "host" => "localhost",
        "username" => "u31286p25829",
        "password" => "tqcWD0Rg",
        "name" => "u31286p25829_diskloophole"
    ),

);
$GLOBALS["instances"] = array();

//require autoloader
require_once $GLOBALS["config"]["path"]["core"]."autoloader.php";
new routerTest();

//redirect to homepage
if($_SERVER['REQUEST_URI'] == '/testFrame/') {
    header('Location: main/test');
}

//show requested files
//$included_files = get_included_files();
//
//foreach ($included_files as $filename) {
//    echo "$filename\n<br/>";
//}

