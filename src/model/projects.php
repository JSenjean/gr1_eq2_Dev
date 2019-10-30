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
