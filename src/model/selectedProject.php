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
            AND project_invitation.request = 1"
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
            AND project_invitation.request = 0"
        );
        $stmt->execute(array('projectId' => $id));
        return $stmt;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function get_project_by_id($id) {
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT * FROM project
            WHERE project.id=:projectId"
        );
        $stmt->execute(array('projectId' => $id));
        return $stmt;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function editProject ($id) {
    $name = trim(strip_tags($_POST['name']));
    $description = trim(strip_tags($_POST['description']));
    $visibility = isset($_POST['visibility']);
    try{
        $bdd = dbConnect();
        $stmt = $bdd->prepare("UPDATE project SET name=:name, description=:description, visibility=:visibility WHERE id=:id");
        $stmt->execute(array(
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'visibility' => $visibility
        ));
    }
    catch(PDOException $e){
        echo  "<br>" . $e->getMessage();
    }
}

function acceptRequest ($projectId, $userId) {
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "
        ");
        $stmt->execute(
            
        );
        return $stmt;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

?>
