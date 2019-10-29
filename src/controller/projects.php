<?php
include_once("model/projects.php");
if (isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    if ($_SESSION['role'] == 'user')
        include_once("view/memberHeader.php");
    else
        include_once("view/modHeader.php");
}
$projects=get_all_project_by_id($_SESSION["id"]);
//print_r($projects);
include_once("view/projects.php");
?>