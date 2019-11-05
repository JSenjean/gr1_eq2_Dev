<?php

function get_project_master($id){
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT * FROM user
            INNER JOIN project_member ON user.id = project_member.user_id
            WHERE project_member.project_id=:projectId
            AND project_member.role = 'master'"
        );
        $stmt->execute(array('projectId' => $id));
        return $stmt;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function get_all_project_members($id) {
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT * FROM user
            INNER JOIN project_member ON user.id = project_member.user_id
            WHERE project_member.project_id=:projectId
            AND project_member.role != 'master'"
        );
        $stmt->execute(array('projectId' => $id));
        return $stmt;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function get_all_project_joining_requests($id) {
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT * FROM user
            INNER JOIN project_invitation ON user.id = project_invitation.user_id
            WHERE project_invitation.project_id=:projectId
            AND project_invitation.request = 0"
        );
        $stmt->execute(array('projectId' => $id));
        return $stmt;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function get_all_project_invitations($id) {
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT * FROM user
            INNER JOIN project_invitation ON user.id = project_invitation.user_id
            WHERE project_invitation.project_id=:projectId
            AND project_invitation.request = 1"
        );
        $stmt->execute(array('projectId' => $id));
        return $stmt;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

?>
