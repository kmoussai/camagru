<?php

    function redirect($toUrl)
    {
        header('location: '. URLROOT . $toUrl);
    }

    function islogged()
    {
       // session_start();
        if (isset($_SESSION['user_id']))
            return true;
        else
            return false;
    }