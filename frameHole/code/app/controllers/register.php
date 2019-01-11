<?php
class register{

    function index(){
        views::viewContent('register::index');
    }

    function create(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $telefoon = $_POST['telefoon'];

            $crud = new Crud();
            $sql = "INSERT INTO profile (email, telefoon, address, password) VALUES ('$email', '$telefoon', '$address', '$password')";

            $result = $crud->execute($sql);

            header('location: ../profile/overview');
        }else{
            echo 'seems like the method requested was not post';
        }
    }

}