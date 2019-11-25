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


     $c = curl_init();
     curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($c, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
     curl_setopt($c, CURLOPT_URL, 'https://api.github.com/users/google/repos');
     $content = curl_exec($c);
     curl_close($c);
     $api = json_decode($content);
     print($api->open_issues_count);


include_once "view/projectNav.php";
include_once "view/release.php";