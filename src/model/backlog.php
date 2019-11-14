<?php
function add_inside_project_role($projectID, $roleName, $roleDescription)
{
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "INSERT INTO 
             inside_project_role(project_id,name,description) 
            VALUES(:project_id,:name,:description)"
        );

        $stmt->execute(array(
            ':project_id' => $projectID,
            ':name' => $roleName,
            ':description' => $roleDescription
        ));
        return $bdd->lastInsertId();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
        return -1;
    }
}
function get_all_inside_project_role($projectID)
{
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT *
                FROM inside_project_role
                WHERE project_id=:projectId"
        );

        $stmt->execute(array(':projectId' => $projectID));

        return $stmt;
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
        return -1;
    }
}
function modify_inside_project_role($roleID, $roleName, $roleDescription)
{
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "UPDATE inside_project_role
                SET name=:roleName, description=:roleDescription
                WHERE id=:roleID"
        );

        $stmt->execute(array(
            ':roleID' => $roleID,
            ':roleName' => $roleName,
            ':roleDescription' => $roleDescription
        ));
        return $roleID;
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
        return -1;
    }
}
function remove_by_role_id($id)
{
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "DELETE FROM inside_project_role
                    WHERE id=:roleID"
        );

        $stmt->execute(array(':roleID' => $id));
        return 1; //success
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }
}
function get_all_US_by_project_id($project_id)
{
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT us.*
                FROM inside_project_role=ipr,user_story=us
                WHERE us.project_id=:projectID"
        );

        $stmt->execute(array(':projectID' => $project_id));
        return $stmt; //success
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }
}
function add_inside_project_US($projectID, $USName, $roleId, $iCan, $soThat,$difficulty,$workValue,$done)
{
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "INSERT INTO 
             user_story(project_id,name,priority,effort,i_can,so_that,role_id,done) 
            VALUES(:projectID,:USName,:workValue,:difficulty,:iCan,:soThat,:roleId,:done)"
        );

        $stmt->execute(array(
            ':projectID' => $projectID,
            ':USName' => $USName,
            ':roleId' => $roleId,
            ':workValue' => $workValue,
            ':difficulty' => $difficulty,
            ':iCan' => $iCan,
            ':soThat' => $soThat,
            ':roleId' => $roleId,
            ':done' => $done,

        ));
        return $bdd->lastInsertId();
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
        return -1;
    }
}