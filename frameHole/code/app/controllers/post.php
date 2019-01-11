<?php
class post{


    function new_post(){
        $crud = new Crud();
        $sql = 'SELECT name FROM category';

        $result = $crud->getData($sql);

        $args = array(
            'category'=> $result
        );
        views::viewContent('post::new', $args);
    }

    function create(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $cat = $_POST['cat'];
            $subCat = $_POST['sub-cat'];
            $user_ID = $_SESSION['profile'][0]['id'];

            $crud = new Crud();
            $sql = "INSERT INTO post (postName, category, subCat, profile_ID) VALUES ('$name', '$cat', '$subCat', '$user_ID')";

            $result = $crud->execute($sql);
        }
    }


     function deleteIt()
     {
       $name = $_POST['name'];
       var_dump($_SESSION['profile']);
       if($_POST['function'] == 'delete') {
           $crud = new Crud();
           $sql = "DELETE FROM post WHERE postName = '$name'";
           $result = $crud->execute($sql);
       }
     }


     function getName()
    {
        $test = "hoi";
        echo $test;
    }
    function personal(){

    }

}

