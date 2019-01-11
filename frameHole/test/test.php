<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    /* special ajax here */
    var_dump($_SERVER);
    if($_SERVER['HTTP_REFERER'] != "http://diskloophole.nl/testFrame/profile/items"){
        echo "wrong location";
    }else{
        echo "right";
    }
}