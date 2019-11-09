<?php
    require_once '../app/config/Config.php';

    spl_autoload_register(function($class){
        require_once 'libraries/'.$class.'.php';
    });
 //   require_once '../app/libraries/Core.php';
   // require_once '../app/libraries/Controller.php';