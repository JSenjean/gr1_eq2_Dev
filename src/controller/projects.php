<?php
include_once("model/projects.php");
if (isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    if ($_SESSION['role'] == 'user')
        include_once("view/memberHeader.php");
    else
        include_once("view/modHeader.php");
}

if(isset($_SESSION['projectToDelete']))
{
    if(remove_by_project_id($_SESSION['projectToDelete'])==1)
    {
    include_once("view/successes/deletedProject.php");
    }
    else
    {
    include_once("view/errors/deletedProject.php");
    }
}
$projects=get_all_project_by_id($_SESSION["id"]);
//print_r($projects);
include_once("view/projects.php");
include_once("view/validate/deleteProject.php");
?>