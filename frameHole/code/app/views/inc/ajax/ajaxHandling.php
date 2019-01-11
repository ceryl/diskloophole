<?php
require_once('../../../controllers/post.php');
require_once('../../../../core/classes/Crud.php');
if($_POST['function'] == 'delete'){
   $function = $_POST['function'];
   switch ($function){
       case 'delete' :  $call =new post();
                        $call->deleteIt();
                        break;
       case 'other' : echo 'something went wrong';break;
   }
}else{
    echo 'empty';
}
//// Default response is an error.
//$response = ['err' => -1, 'msg' => "Sorry, the request could not be completed."];
//
//if( isset( $_POST['action'], $_POST['target'] ) )
//{
//switch( $_POST['action'] ) // Maybe you want this file to work with more than one 'action'.
//{
//case 'delete':
//// Handle delete and lets assume all went well.
//$response = ['err' => 0, 'msg' => "Hey, it worked!" ];
//break;
//
//default:
//// Handle unknown API call.
//break;
//}
//}
