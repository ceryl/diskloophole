<?php

class MPC_Controller{

    /**
     * @var views
     */
    protected $presenterContext = false;

    public function __construct()
    {
    }

    public function setPresenterContext ($presenterContext = false){
        if($presenterContext){
            $this->presenterContext = $presenterContext;
        }else{
            $this->presenterContext = new views();
        }
    }


    public function getPresenterContext (){

        return $this->presenterContext;

    }

    public function getArguments ()
    {
        return routerTest::getUri();
    }

    public function getFirstArgument ()
    {
        return routerTest::getMethod();
    }

    public function getSecondArgument ()
    {
        return routerTest::getFunction();
    }

}