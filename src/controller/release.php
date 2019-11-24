<?php

require_once "model/selectedProject.php";

$projectId = $_GET["projectId"];
$isMaster = is_master($UserID, $projectId);
$isMember = is_member($UserID, $projectId);
if (!$isMaster && !$isMember) {
     header('Location: index.php?action=projects');
}

if ($_SESSION['role'] == 'user') {
    include_once "view/memberHeader.php";
} else {
     include_once "view/modHeader.php" ;
}

include_once "view/projectNav.php";
include_once "view/release.php";