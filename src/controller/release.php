<?php

require_once "model/selectedProject.php";
require_once "model/release.php";

$UserID = $_SESSION["id"];

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

$gitUrl=get_git_url($projectId)->fetch()["release_git"];


include_once "view/projectNav.php";
include_once "view/release.php";