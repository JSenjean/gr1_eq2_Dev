<?php
include_once("model/selectedProject.php");
include_once("model/backlog.php");
$UserID = $_SESSION["id"];

if (
    isset($_POST["projectIdToAdd"]) &&
    isset($_POST["roleName"]) &&
    isset($_POST["roleDescription"]) &&
    isset($_POST["roleId"])
) {
    echo modify_inside_project_role(
        $_POST["roleId"],
        $_POST["roleName"],
        $_POST["roleDescription"]
    );
} elseif (
    isset($_POST["projectIdToAdd"]) &&
    isset($_POST["roleName"]) &&
    isset($_POST["roleDescription"])
) {
    echo add_inside_project_role(
        $_POST["projectIdToAdd"],
        $_POST["roleName"],
        $_POST["roleDescription"]
    );
} elseif(isset($_POST["removeRole"]))
{
    echo remove_by_role_id($_POST["roleId"]);
}
else {
    $projectId = $_GET["projectId"];
    $isMaster = is_master($UserID, $projectId);
    $isMember = is_member($UserID, $projectId);
    if (!$isMaster && !$isMember)
        header('Location: index.php?action=projects');


    if ($_SESSION['role'] == 'user') {
        include_once("view/memberHeader.php");
    } else {
        include_once("view/modHeader.php");
    }

    $roles = get_all_inside_project_role($projectId)->fetchAll();

    include_once("view/backlog.php");
    include_once("view/validate/addRoleToProject.php");
}
