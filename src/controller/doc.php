<?php
include_once("model/selectedProject.php");


if ($_SESSION['role'] == 'user') {
    include_once("view/memberHeader.php");
} else {
    include_once("view/modHeader.php");
}
$projectId = $_GET['projectId'];
include_once("view/projectNav.php");
include_once("view/doc.php");