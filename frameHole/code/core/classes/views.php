<?php
class views{

    public function __construct()
    {

    }

    public static function viewContent($viewFile, $args = array(), $returnOutput = false)
    {
        $presenterResult = false;

        $viewFileCheck = explode(".", $viewFile);
        if(!isset($viewFileCheck[1])){
            $viewFile .= ".php";
        }

        $viewFile = str_replace("::", "/", $viewFile);
        require_once $GLOBALS["config"]["path"]["app"]. "views/templates/header.php";
        require_once $GLOBALS["config"]["path"]["app"]. "views/templates/nav.php";
        require_once $GLOBALS["config"]["path"]["app"]."views/{$viewFile}";
        require_once $GLOBALS["config"]["path"]["app"]. "views/templates/footer.php";

        // Convert array keys to presenter variables
        if (is_array($args)){
            extract($args, EXTR_SKIP);
        }

        if ($returnOutput){
            Client_Output::startBuffer(false);

        }

        //output
        if($returnOutput){
            $presenterResult = Client_Output::getBufferContent();
        }

        return $presenterResult;
    }
}