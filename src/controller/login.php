<?php

    if(!isset($_SESSION)){
        session_start();
    }

    include_once("model/login.php");
    login();
    
    if (isset($_SESSION['username'])){
        $id = $_SESSION['id'];
        if ($_SESSION['role'] == 'user')
            include_once("view/memberHeader.php");
        else
            include_once("view/modHeader.php");
        //include_once("view/member.php");
    }
    else {
        include_once("view/errors/signin.php");
        include_once("view/index.php");
    }

?>