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