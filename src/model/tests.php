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
    $nbTotalTests = 0;

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
        ++$nbTotalTests;
    }
    
    return array($nbTotalTests, $nbPassed, $nbFailed, $nbDeprecated, $nbNeverRun);
}

function compute_proportion($projectId) {

    $proportion = count_proportion($projectId);

    $nbTotalTests = $proportion[0];
    $nbPassed = $proportion[1];
    $nbFailed = $proportion[2];
    $nbDeprecated = $proportion[3];
    $nbNeverRun = $proportion[4];

    if ($nbTotalTests != 0) {

        $percPassed = (int)(($nbPassed*100)/$nbTotalTests);
        $percFailed = (int)(($nbFailed*100)/$nbTotalTests);
        $percDeprecated = (int)(($nbDeprecated*100)/$nbTotalTests);
        $percNeverRun = (int)(($nbNeverRun*100)/$nbTotalTests);

        if (($percPassed + $percFailed + $percDeprecated + $percNeverRun) < 100){
            ++$percPassed;
        }
    
        return array($percPassed, $percFailed, $percDeprecated, $percNeverRun);

    } else {
        return -1;
    }
}

function add_new_test($projectId, $name, $description, $state) {
    date_default_timezone_set('Europe/Paris');
    $currentDate = date('Y-m-d', time());
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "INSERT INTO
            test(project_id, name, description, last_run, state)
            VALUES(:project_id, :name, :description, :last_run, :state)"
        );
        $stmt->execute(array(
            ':project_id' => $projectId,
            ':name' => $name,
            ':description' => $description,
            ':last_run' => $currentDate,
            ':state' => $state
        ));
        return $state;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
        return -1;
    }
}

function pass_all_tests($projectId) {
    date_default_timezone_set('Europe/Paris');
    $currentDate = date('Y-m-d', time());
    try {
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "UPDATE test
            SET state=:state, last_run=:last_run
            WHERE project_id=:project_id"
        );
        $stmt->execute(array(
            ':project_id' => $projectId,
            ':last_run' => $currentDate,
            ':state' => 'passed'
        ));
        return $stmt;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
        return -1;
    }
}

function edit_test($id, $name, $description, $state) {
    try{
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "UPDATE test
            SET name=:name, description=:description, state=:state
            WHERE id=:id"
        );
        $stmt->execute(array(
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'state' => $state
        ));
        return $state;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
        return -1;
    }
}

function delete_test($id, $state) {
    try{
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "DELETE FROM test
            WHERE id=:id"
        );
        $stmt->execute(array(
            'id' => $id
        ));
        return $state;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
        return -1;
    }
}

function change_state($id, $state) {
    try{
        $bdd = dbConnect();
        $stmt = $bdd->prepare(
            "UPDATE test
            set state=:state
            WHERE id=:id"
        );
        $stmt->execute(array(
            'id' => $id,
            'state' => $state
        ));
        return $stmt;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
        return -1;
    }
}

?>
