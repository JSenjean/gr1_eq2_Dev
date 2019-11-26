<?php
function get_git_url($projectID)
{
    try {
    $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT release_git
                FROM project
                WHERE id=:projectId"
        );

    $stmt->execute(array(':projectId' => $projectID));
    return $stmt;
} catch (PDOException $e) {
    echo  "<br>" . $e->getMessage();
    return -1;
}
}