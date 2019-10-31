<?php

/**
 * Return all project with id
 */
function get_all_project_by_id($id)
{
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT p.id, p.name, p.description, p.visibility, pm.role
                    FROM project=p,project_member=pm
                    WHERE p.id=pm.project_id AND pm.user_id=:usrId"
        );

        $stmt->execute(array(':usrId' => (int) $id));
        return $stmt;
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }
}
function remove_by_project_id($id)
{
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "DELETE FROM project
                    WHERE id=:projectId"
        );

        $stmt->execute(array(':projectId' => (int) $id));
        return 1; //success
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }
}

function create_new_project($userId,$name,$description,$visibility=1)
{
    
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "INSERT INTO 
             project(name,description,visibility) 
            VALUES(:name,:description,:visibility)"
        );

        $stmt->execute(array(':name' => $name,
        ':description' => $description,
        ':visibility' => $visibility
    ));
    $projectId=$bdd->lastInsertId();
    associat_project_and_user($userId,$projectId,"master");
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }
}
function associat_project_and_user($userId,$projectId,$role)
{
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "INSERT INTO 
             project_member(role,project_id,user_id) 
            VALUES(:role,:project_id,:user_id)"
        );

        $stmt->execute(array(':role' => $role,
        ':project_id' => $projectId,
        ':user_id' => $userId
       
    ));   
    return 1; 
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
    }
}