<?php
class profile{



    function overview(){

        if(login::isSession() == true){
            views::viewContent("account::overview");
        }

    }

    function items(){

        $crud = new Crud();
        $user_ID = $_SESSION['profile'][0]['id'];
        $sql = "SELECT * FROM post WHERE profile_ID LIKE '$user_ID'";

        $result = $crud->getData($sql);

        $args = array(
            'posts' => $result
        );
        views::viewContent( 'post::personal', $args);


    }

    function comments(){

    }

    function account(){
        views::viewContent("account::edit");
    }

    function edit(){
        if(login::isSession() == true){
        if (isset($_POST)) {
            $crud = new Crud();
            $val = new Validation();

            $userID = $_SESSION['profile'][0]['id'];
            $email = $crud->escape_string($_POST['newEmail']);
            $password1 = $crud->escape_string($_POST['newPassword1']);
            $password = $crud->escape_string($_POST['newPassword2']);
            $currentPass = $crud->escape_string($_POST['password']);
            $firstName = $crud->escape_string($_POST['firstName']);
            $lastName = $crud->escape_string($_POST['lastName']);
            $phone = $crud->escape_string($_POST['phone']);
            $loginName = $crud->escape_string($_POST['loginName']);

            //val
            $msg = $val->check_empty($_POST, array('email'));
            $passComp = $val->compareValues($password, $password1);


            if ($msg != null) {
                echo $msg;
            } elseif (!$passComp) {
                echo 'the new passwords you´ve entered are not the same, please check this';
            } else {
                $sql = "UPDATE Member SET email = '$email', password = '$password', firstName = '$firstName', lastName = '$lastName', phone = '$phone', loginName = '$loginName ' WHERE password LIKE '$currentPass' AND id LIKE '$userID'";
                $result = $crud->execute($sql);

                header('location: ');
            }
        }
        }else{
            print "no post request has been started";
        }
    }
}