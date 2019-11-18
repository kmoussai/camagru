<?php
    require_once '../app/config/Config.php';


    require_once '../app/helpers/Helper.php';
    spl_autoload_register(function($class){
        if ($class !== 'PHPMailer')
            require_once 'libraries/'.$class.'.php';
    });
 //   require_once '../app/libraries/Core.php';
   // require_once '../app/libraries/Controller.php';