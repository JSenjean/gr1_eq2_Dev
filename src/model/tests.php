<?php

function get_all_passed_tests($projectId) {
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT * FROM test
            WHERE project_id=:projectId
            AND state = 'passed'"
        );
        $stmt->execute(array('projectId' => $projectId));
        return $stmt;
    } catch (PDOException $e) {
        echo"<br>" . $e->getMessage();
    }
}

function get_all_deprecated_tests($projectId) {
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT * FROM test
            WHERE project_id=:projectId
            AND state = 'deprecated'"
        );
        $stmt->execute(array('projectId' => $projectId));
        return $stmt;
    } catch (PDOException $e) {
        echo"<br>" . $e->getMessage();
    }
}

function get_all_failed_tests($projectId) {
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT * FROM test
            WHERE project_id=:projectId
            AND state = 'failed'"
        );
        $stmt->execute(array('projectId' => $projectId));
        return $stmt;
    } catch (PDOException $e) {
        echo"<br>" . $e->getMessage();
    }
}

function get_all_never_run_tests($projectId) {
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT * FROM test
            WHERE project_id=:projectId
            AND state = 'never_run'"
        );
        $stmt->execute(array('projectId' => $projectId));
        return $stmt;
    } catch (PDOException $e) {
        echo"<br>" . $e->getMessage();
    }
}

function count_proportion($projectId) {
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "SELECT * FROM test
            WHERE project_id=:projectId"
        );
        $stmt->execute(array('projectId' => $projectId));
    } catch (PDOException $e) {
        echo"<br>" . $e->getMessage();
    }

    $nbPassed = 0;
    $nbFailed = 0;
    $nbDeprecated = 0;
    $nbNeverRun = 0;

    foreach ($stmt as $s){
        switch ($s['state']) {
            case 'passed':
                ++$nbPassed;
                break;
            case 'failed':
                ++$nbFailed;
                break;
            case 'deprecated':
                ++$nbDeprecated;
                break;
            case 'never_run':
                ++$nbNeverRun;
                break;
            default:
                echo "Error, Test n°" . $s['id'] . " named " . $s['name'] . " has an unknown state";
                return -1;
        }
    }
    $nbTotalTests = $nbPassed + $nbFailed + $nbDeprecated + $nbNeverRun;
    return array($nbTotalTests, $nbPassed, $nbFailed, $nbDeprecated, $nbNeverRun);
}

function compute_proportion($projectId) {

    $proportion = count_proportion($projectId);

    $nbTotalTests = $proportion[0];
    $nbPassed = $proportion[1];
    $nbFailed = $proportion[2];
    $nbDeprecated = $proportion[3];
    $nbNeverRun = $proportion[4];

    $percPassed = (int)(($nbPassed*100)/$nbTotalTests);
    $percFailed = (int)(($nbFailed*100)/$nbTotalTests);
    $percDeprecated = (int)(($nbDeprecated*100)/$nbTotalTests);
    $percNeverRun = (int)(($nbNeverRun*100)/$nbTotalTests);

    return array($percPassed, $percFailed, $percDeprecated, $percNeverRun);
}

?>
