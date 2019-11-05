<?php

include_once("model/selectedProject.php");

include_once("view/memberHeader.php");
include_once("view/projectNav.php");

$projectMaster = get_project_master($_GET['projectId']);
$members = get_all_project_members($_GET['projectId']);
$requests = get_all_project_joining_requests($_GET['projectId']);
$invitations = get_all_project_invitations($_GET['projectId']);

if (isset($_GET['page']) == 'backlog') {    
    include_once("view/backlog.php");
}else if(isset($_GET['page']) == 'sprints') {
    include_once("view/sprints.php");
}else if(isset($_GET['page']) == 'tests') {
    include_once("view/tests.php");
}else if(isset($_GET['page']) == 'doc') {
    include_once("view/doc.php");
}else if(isset($_GET['page']) == 'release') {
    include_once("view/release.php");
}else {
    include_once("view/selectedProject.php");
}

?>