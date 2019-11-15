<?php

    include_once("model/selectedProject.php");
    include_once("model/tests.php");

    $userId = $_SESSION["id"];
    $projectId = $_GET["projectId"];

    $isMaster = is_master($userId, $projectId);
    $isMember = is_member($userId, $projectId);

    if (!$isMaster && !$isMember) {
        header('Location: index.php?action=projects');
    }

    if ($_SESSION['role'] == 'user') {
        include_once("view/memberHeader.php");
    } else {
        include_once("view/modHeader.php");
    }


    include_once("view/projectNav.php");
    include_once("view/tests.php");

?>
