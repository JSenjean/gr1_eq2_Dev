<?php

    include_once("model/selectedProject.php");
    include_once("model/tests.php");

    $userId = $_SESSION["id"];

    if (isset($_POST['manageTest'])) {
        if($_POST['manageTest'] == 'add') {
            echo add_new_test(
                $_POST["projectId"],
                $_POST["name"],
                $_POST["description"],
                $_POST["state"]
            );
        }
    
    } else if (isset($_POST['divToRefresh'])) {
        switch ($_POST['divToRefresh']){
            case 'failed':
                $testsFailed = get_all_failed_tests($_POST["projectId"]);
                include_once("view/tests/failedTests.php");
                break;
            case 'deprecated':
                $testsDeprecated = get_all_deprecated_tests($_POST["projectId"]);
                include_once("view/tests/deprecatedTests.php");
                break;
            case 'never_run':
                $testsNeverRun = get_all_never_run_tests($_POST["projectId"]);
                include_once("view/tests/neverrunTests.php");
                break;
            case 'passed':
                $testsPassed = get_all_passed_tests($_POST["projectId"]);
                include_once("view/tests/passedTests.php");
                break;
            default:
                echo ("Erreur, impossible de rafraîchir la div " . $_POST['divToRefresh']);
                break;
        }
    } else if(isset($_POST['refreshProgressBar'])) {
        $proportion = compute_proportion($_POST["projectId"]);
        $percPassed = $proportion[0];
        $percFailed = $proportion[1];
        $percDeprecated = $proportion[2];
        $percNeverRun = $proportion[3];
        include_once("view/tests/progressBar.php");
    } else {

        $projectId = $_GET["projectId"];

        $isMaster = is_master($userId, $projectId);
        $isMember = is_member($userId, $projectId);

        $testsPassed = get_all_passed_tests($projectId);
        $testsDeprecated = get_all_deprecated_tests($projectId);
        $testsFailed = get_all_failed_tests($projectId);
        $testsNeverRun = get_all_never_run_tests($projectId);

        $proportion = compute_proportion($projectId);

        if ($proportion != -1){
            $percPassed = $proportion[0];
            $percFailed = $proportion[1];
            $percDeprecated = $proportion[2];
            $percNeverRun = $proportion[3];
        } else {
            $percPassed = 0;
            $percFailed = 0;
            $percDeprecated = 0;
            $percNeverRun = 0;
        }

        if (!$isMaster && !$isMember) {
            header('Location: index.php?action=projects');
        }

        if ($_SESSION['role'] == 'user') {
            include_once("view/memberHeader.php");
        } else {
            include_once("view/modHeader.php");
        }

        include_once("view/projectNav.php");
        
        include_once("view/tests/header.php");
        include_once("view/tests/progressBar.php"); 
        include_once("view/tests/commandPanel.php"); 
        include_once("view/tests/failedTests.php"); 
        include_once("view/tests/deprecatedTests.php"); 
        include_once("view/tests/neverrunTests.php"); 
        include_once("view/tests/passedTests.php"); 
        include_once("view/tests/footer.php"); 

        include_once("view/tests/newTestModal.php");

    }

?>
