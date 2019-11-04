<?php

//include_once("model/selectedProject.php");

include_once("view/memberHeader.php");
include_once("view/projectNav.php");

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