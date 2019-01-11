<?php
class login extends sessions{

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
       // if($this::isSession() == true){
         //   views::viewContent("account::overview");
       // }else{
            views::viewContent("account::login");
        //}
    }

    function getProfile()
    {
        if (isset($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $crud = new Crud();

            //query
            $sql = "SELECT * FROM profile WHERE password LIKE  '$password' AND email LIKE '$email'";
            //fetching method
            $result = $crud->getData($sql);

            if($result[0]['email'] != ''){
                $_SESSION['profile']= $result;
                header('location: ../main/test');
            }else{
                header('location:  ../login/index');
            }
        }
    }

    function logout()
    {
            session_unset($_SESSION['profile']);
            session_destroy();
            header('location: ../main/blah');
    }

    static function isSession()
    {
        if(isset($_SESSION['profile'])){
            return true;
        }else{
            header('location: ../login/index');
        }
    }
}