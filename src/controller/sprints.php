<?php
include_once("model/selectedProject.php");
include_once("model/sprints.php");
$UserID = $_SESSION["id"];
$projectId = $_GET['projectId'];

if ($_SESSION['role'] == 'user') {
    include_once("view/memberHeader.php");
} else {
    include_once("view/modHeader.php");
}
include_once("view/projectNav.php");

$sprints = get_all_sprints($projectId)->fetchAll();
include_once("view/sprints.php");
