<?php

class MPC_PresenterContext{

    const CLASS_NAME = 'MPC_PresenterContext';

    public $destinations = array();

    public $paths = array();
    public $variables = array();
    public $elements = array();

    private $presenterPath = '';

    public static $findAndLoadVariablesToExtract = array();

    public function __construct()
    {
        $this->presenterPath = $GLOBALS["config"]["path"]["app"]."/views";
    }

    public function setDestination($destination = false)
    {
        if($destination !== false){
            $this->destinations[] = $destination;
        }
    }
    public function findFilePath($presenter = "")
    {
        if(!strpos($presenter, ".")){
            $presenter .= ".php";
        }

        if (file_exists($this->presenterPath. '/'.$presenter)){
            return $this->presenterPath.'/'.$presenter;
        }else{
            echo "no file";
            //return false;
        }
    }
    public function findAndLoad($presenter = "", $arguments = array(), $returnOutput = false)
    {

        $presenterResult = false;

        if(is_array($arguments) && count($arguments )> 0 ){
            foreach ($arguments as $k => $v) {
                MPC_PresenterContext::$findAndLoadVariablesToExtract[$k] = $v;
            }
            // Convert array keys to presenter variables
            if (is_array($arguments)) {
                extract($arguments, EXTR_SKIP);
            }

            if ($returnOutput) {
                Client_Output::startBuffer(false);
            }


            $presenterFilePath = $this->findFilePath($presenter); // old | new presenters folder

            if ($presenterFilePath)
            {
                require($presenterFilePath);
                $presenterResult = true;
            }else{
                echo "nothing there";
            }
            /*else {
                throw new Exception('Cant find presenter located at: '.$presenterFilePath);
            }*/

             //output
            if ($returnOutput) {
                $presenterResult = Client_Output::getBufferContent();
            }

            // cleanup
            if ($this->settings['automaticallyResetVariables'])
            {
                $this->variables = array();
            }
            if ($this->settings['automaticallyResetSettings'])
            {
                $this->settings = array
                (
                    'automaticallyResetSettings' => false,
                    'automaticallyResetVariables' => false
                );
            }

            return $presenterResult;
        }
    }
    public function getURIPathPrefix($key = "", $suffix = "")
    {
        if($key == 'presenters'){
            $folderAndFileName = '/presenters/'.$suffix;
        }else{
            $folderAndFileName = '/'.$suffix;
        }

        $ex = explode('?', $folderAndFileName);
        if(count($ex) > 1){
            $folderAndFileName = $ex[0];
        }
        if(file_exists(substr($this->presenterPath, 0 , -11).$folderAndFileName)){
            return $folderAndFileName;
        }
    }

}

/**
 * copy
 */
//class MPC_PresenterContext
//{
//    const CLASS_NAME = 'MPC_PresenterContext';
//
//    public $settings = array
//    (
//        'automaticallyResetSettings' => false,
//        'automaticallyResetVariables' => false
//    );
//
//    public $destinations = array();
//
//    public $paths = array();
//    public $variables = array();
//    public $elements = array();
//
//    private $oldPresentersPath = '';
//    private $newPresentersPath = '';
//
//    public static $findAndLoadVariablesToExtract = array();
//
//    public function __construct ()
//    {
//        // paths
//        $ex = explode('/', dirname(__FILE__));
//        $this->presenterPath = $GLOBALS["config"]["path"]["app"]."/views";
//    }
//
//    public function setDestination ($destination = false)
//    {
//        if ($destination !== false)
//        {
//            $this->destinations[] = $destination;
//        }
//    }
//
//    public function findFilePath ($presenter = '')
//    {
//        // fallback for all ::findAndLoad() usages with a parameter without extension!
//        if(!strpos($presenter, '.')) {
//            $presenter .= '.php';
//        }
//
//        if(file_exists($this->presenterPath.'/'.$presenter)) {
//            return $this->presenterPath.'/'.$presenter;
//        } else {
//            return false;
//
//        }
//    }
//
//    public function findAndLoad ($presenter = '', $arguments = array(), $returnOutput = false)
//    {
//        $presenterResult = false;
//
//        // save for taxitender compatibility
//        if(is_array($arguments) && count($arguments) > 0) {
//            foreach ($arguments as $k => $v) {
//                MPC_PresenterContext::$findAndLoadVariablesToExtract[$k] = $v; // werkt niet met self:: !
//            }
//        }
//        //
//
//        // Convert array keys to presenter variables
//        if (is_array($arguments)) {
//            extract($arguments, EXTR_SKIP);
//        }
//
//        if ($returnOutput) {
//            XXX_Client_Output::startBuffer(false);
//        }
//
//        // include presenter file
//        $presenterFilePath = $this->findFilePath($presenter); // old | new presenters folder
//        if ($presenterFilePath)
//        {
//            require($presenterFilePath);
//            $presenterResult = true;
//        }
//        /*else {
//		    throw new Exception('Cant find presenter located at: '.$presenterFilePath);
//        }*/
//
//        // output
//        if ($returnOutput) {
//            $presenterResult = XXX_Client_Output::getBufferContent();
//        }
//
//        // cleanup
//        if ($this->settings['automaticallyResetVariables'])
//        {
//            $this->variables = array();
//        }
//        if ($this->settings['automaticallyResetSettings'])
//        {
//            $this->settings = array
//            (
//                'automaticallyResetSettings' => false,
//                'automaticallyResetVariables' => false
//            );
//        }
//
//        // return
//        return $presenterResult;
//    }
//
//    public function getRawFileContent ($presenter = '')
//    {
//        $presenterFilePath = $this->findFilePath($presenter); // old | new presenters folder
//
//        if(file_exists($presenterFilePath)) {
//            return XXX_FileSystem_Local::getFileContent($presenterFilePath);
//
//        } else {
//            return false;
//        }
//
//    }
//
//    /**
//     * Haal de URI van een file op al kijkende naar de beschikbare cache files op de static.
//     * Indien je de caching wilt omzeilen dan moet je de static.cacheMapping.php op de Comcordis_Static (telkens) verwijderen.
//     *
//     * @param string $key
//     * @param string $suffix
//     * @return bool|string
//     */
//    public function getURIPathPrefix ($key = '', $suffix = '')
//    {
//        // folder and filename
//        $folderAndFileName = '';
//        if($key == 'presenters' || $key == 'projectPresenters') {
//            $folderAndFileName = '/presenters/'.$suffix;
//        } else {
//            $folderAndFileName = '/'.$suffix;
//        }
//
//        if(HTTP_LABEL == 'cheapTaxis'/* || TT_BASED_LAYOUT === true*/) {
//
//            $folderAndFileName = str_replace('forms/bookARide/', 'bookARideNew/', $folderAndFileName);
//
//        } else {
//
//        }
//
//        // strip ?timestamp=*crap*
//        $ex = explode('?', $folderAndFileName);
//        if(count($ex) > 1) {
//            $folderAndFileName = $ex[0];
//        }
//
//        if(file_exists( substr($this->oldPresentersPath, 0, -11).$folderAndFileName)) {
//            return '/modules/httpServer/modules/www'.$folderAndFileName;
//
//        } elseif(file_exists( substr($this->newPresentersPath, 0, -11).$folderAndFileName)) {
//            return $folderAndFileName;
//
//        } else {
//            return $folderAndFileName;
//        }
//    }
//
//    // TODO static for images, js etc., normal for redirects etc.
//    public function composeJS ()
//    {
//        /*$pathPrefixes = $this->getPathPrefixes();
//
//        $filteredPathPrefixes = array();
//
//        foreach ($pathPrefixes as $key => $pathPrefix)
//        {
//            if (XXX_String::hasPart($key, 'URI'))
//            {
//                $filteredPathPrefixes[$key] = $pathPrefix;
//            }
//        }
//
//        $result = '';
//
//        $result .= 'XXX_MPC_PresenterContext.pathPrefixes = ' . XXX_String_JSON::encode($filteredPathPrefixes) . ';' . XXX_OperatingSystem::$lineSeparator;
//
//        return $result;*/
//    }
//}
