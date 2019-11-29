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

function save_all_commit($projectID, $allCommits)
{
    //$command.="INSERT INTO project_commit(project_id,sha,committerName,commitMessage,commitUrl) VALUES(" . $projectID .",". $oneCommit->sha . ",". $oneCommit->commit->author->name . "," . $oneCommit->commit->message . "," . $oneCommit->html_url ." )";

    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "INSERT INTO project_commit(project_id,sha,committerName,commitMessage,commitUrl,commitDate) VALUES(:projectID,:sha,:committerName,:commitMessage,:commitUrl,:commitDate)"
        );
        foreach ($allCommits as $cell) {
            if (is_array($cell)) {
                foreach ($cell as $oneCommit) {
                    $stmt->execute(
                        array(
                    ':projectID' => $projectID,
                    ':sha' => $oneCommit->sha,
                    ':committerName' => $oneCommit->commit->author->name,
                    ':commitMessage' => $oneCommit->commit->message,
                    ':commitUrl' => $oneCommit->html_url,
                    ':commitDate' => date('Y-m-d H:i:s', strtotime(($oneCommit->commit->author->date))),

                )
                    );
                }
            }
        }
        if (count($allCommits[1])>0) {
            deprecate_all_test($projectID);
        }
        return 1;
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
        return -1;
    }
}
function deprecate_all_test($projectID)
{
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "UPDATE test SET state='deprecated' WHERE project_id=:projectId"
        );
        $stmt->execute(array(':projectId' => $projectID));
        return 1;
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
        return -1;
    }
}
function get_all_commit($projectID)
{
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT *
                FROM project_commit
                WHERE project_id=:projectId"
        );

        $stmt->execute(array(':projectId' => $projectID));
        return $stmt;
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
        return -1;
    }
}
function get_last_commit($projectID)
{
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT commitDate
                FROM project_commit
                WHERE project_id=:projectId
                ORDER BY commitDate desc
                LIMIT 1"
        );

        $stmt->execute(array(':projectId' => $projectID));
        return $stmt;
    } catch (PDOException $e) {
        echo  "<br>" . $e->getMessage();
        return -1;
    }
}
