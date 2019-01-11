<?php
class main extends views {
    function test(){

            views::viewContent("main::index");


    }

    function blah(){
        if(login::isSession() == true){
            views::viewContent("main::test");
        }
    }
}