<?php

    include_once("model/selectedProject.php");
    include_once("model/tests.php");

    $userId = $_SESSION["id"];
    if (isset($_POST['name'])) {
        echo "mé lol les ptits amis";
    }else {

        $projectId = $_GET["projectId"];
        
        $defaultDateFormat = 'Y-m-d';
        $desiredDateFormat = 'd M Y';

        $isMaster = is_master($userId, $projectId);
        $isMember = is_member($userId, $projectId);

        $testsPassed = get_all_passed_tests($projectId);
        $testsDeprecated = get_all_deprecated_tests($projectId);
        $testsFailed = get_all_failed_tests($projectId);
        $testsNeverRun = get_all_never_run_tests($projectId);

        $percPassed = compute_proportion($projectId)[0];
        $percFailed = compute_proportion($projectId)[1];
        $percDeprecated = compute_proportion($projectId)[2];
        $percNeverRun = compute_proportion($projectId)[3];

        if (!$isMaster && !$isMember) {
            header('Location: index.php?action=projects');
        }

        if ($_SESSION['role'] == 'user') {
            include_once("view/memberHeader.php");
        } else {
            include_once("view/modHeader.php");
        }

        include_once("view/projectNav.php");
        include_once("view/tests.php");
        include_once("view/validate/newTest.php");

    }

?>
