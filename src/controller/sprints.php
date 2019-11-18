<?php
include_once("model/selectedProject.php");
include_once("model/sprints.php");


if (isset($_POST['delete']) && isset($_POST['sprintToDeleteId'])) {
    echo delete_sprint_by_id($_POST['sprintToDeleteId']);
} else {
    if (isset($_POST['sprintName']) && isset($_POST['startDate']) && isset($_POST['endDate'])) {
        create_new_sprint($_POST['sprintName'], $_POST['startDate'], $_POST['endDate'], $_POST['projectID']);
        $projectId = $_POST['projectID'];
    } else {
        $projectId = $_GET['projectId'];
    }
    include_once("view/projectNav.php");
    $UserID = $_SESSION["id"];
    $sprints = get_all_sprints($projectId)->fetchAll();
    $projectMembers = get_all_project_members_and_master($projectId)->fetchAll();
    if ($_SESSION['role'] == 'user') {
        include_once("view/memberHeader.php");
    } else {
        include_once("view/modHeader.php");
    }
    include_once("view/sprints.php");
    include_once("view/validate/addSprintToProject.php");
    include_once("view/validate/addTaskToSprint.php");
}

