<?php

include_once("model/index.php");


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'signup') {
        include_once("controller/signup.php");
    } elseif ($_GET['action'] == 'login') {
        include_once("controller/login.php");
    } elseif ($_GET['action'] == 'profile') {
        include_once("controller/profile.php");
    } elseif ($_GET['action'] == 'projects') {
        include_once("controller/projects.php");
    } elseif ($_GET['action'] == 'projectDelete') {
        if(isset($_GET['projectId']))
        {
        $_SESSION["projectToDelete"]=$_GET['projectId'];
        include_once("controller/projects.php");
        }
    }
    else if ($_GET['action'] == 'logout'){
        include_once("controller/logout.php");
    }else if ($_GET['action'] == 'modPanel') {
        include_once("controller/modPanel.php");
    }
} else {
    if (!isset($_SESSION['username'])) {
        include_once("view/index.php");
    }else {
        if (isset($_SESSION['role']) && ($_SESSION['role'] == 'user'))
            include_once("view/memberHeader.php");
        else
            include_once("view/modHeader.php");
        include_once("view/member.php");
    }
}
    
}
