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
    unset($_SESSION['projectToDelete']);
    include_once("view/successes/deletedProject.php");
    }
    else
    {
    unset($_SESSION['projectToDelete']);
    include_once("view/errors/deletedProject.php");
    }
}

if(isset($_POST['projectName']) && isset($_POST['projectDescription']))
{
    $visibility;
    if(isset($_POST['visibility']))
    $visibility=1;
    else
    $visibility=0;

    create_new_project($id,$_POST['projectName'],$_POST['projectDescription'],$visibility);
}
$projects=get_all_project_by_id($_SESSION["id"]);
//print_r($projects);
include_once("view/projects.php");
include_once("view/validate/deleteProject.php");
include_once("view/validate/newProject.php");
?>