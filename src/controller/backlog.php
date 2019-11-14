<?php
include_once("model/selectedProject.php");
include_once("model/backlog.php");
include_once("model/sprints.php");
$UserID = $_SESSION["id"];
if (isset($_POST["projectIdToModifyRole"])) {
    if (
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
        isset($_POST["roleName"]) &&
        isset($_POST["roleDescription"])
    ) {
        echo add_inside_project_role(
            $_POST["projectIdToModifyRole"],
            $_POST["roleName"],
            $_POST["roleDescription"]
        );
    } elseif (isset($_POST["removeRole"])) {
        echo remove_by_role_id($_POST["roleId"]);
    }
} elseif (isset($_POST["projectIdToModifyUS"])) {
    if (isset($_POST["allRole"])) { 

        echo json_encode(get_all_inside_project_role($_POST["projectIdToModifyUS"])->fetchAll());
    }elseif(isset($_POST["modifyOrCreateUS"]))
    {
        $name=$_POST["name"];
        $roleId=$_POST["roleId"];
        if(intval($roleId)=="0")$roleId=NULL;
        $done=($_POST['done']) ? 1 : 0;
        $iCan=$_POST["iCan"];
        $soThat=$_POST["soThat"];
        $difficulty=$_POST["difficulty"];
        $workValue=$_POST["workValue"];
        $sprint=$_POST["sprint"];
        if(intval($sprint)=="0") $sprint=NULL;
        echo add_inside_project_US($_POST["projectIdToModifyUS"],$name,$roleId,$iCan,$soThat,$difficulty,$workValue,$done);

    }
} else {
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
    $rolesID=array();
    foreach($roles as $role)
    {
        $rolesID+= array("".$role['id']."" => "".$role['name']."");  
    }

    $userStories = get_all_US_by_project_id($projectId)->fetchAll();    
    $sprints = get_all_sprints($projectId)->fetchAll();
    include_once("view/projectNav.php");
    include_once("view/backlog.php");
    include_once("view/validate/addRoleToProject.php");
    include_once("view/validate/addUserStoryToProject.php");
}
