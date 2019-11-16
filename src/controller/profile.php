<?php

require_once "model/profile.php";

if (isset($_POST['cancelRequestOrInvitation'])) {
    echo CancelRequest($_POST["projectId"]);
} elseif (isset($_POST['acceptInvitation'])) {
    echo AcceptInvitaion($_POST["projectId"]);
} elseif (!checkConnection()) {
    include_once "view/errors/notLogged.php";
    include_once "view/index.php";
} else {
    if (isset($_GET['editInfo'])) {
        $result = editInfo($_SESSION["username"]);
        if ($result == -3) {
            include_once "view/errors/alreadyUsedId.php";
        } elseif ($result == -2) {
            include_once "view/errors/alreadyUsedMail.php";
        } elseif ($result == -1) {
            include_once "view/errors/notLogged.php";
        } else {
            include_once "view/successes/editedProfile.php";
        }
    }

    if (!isset($_SESSION['id'])) {
        include_once "view/errors/notLogged.php";
        include_once "view/index.php";
        return;
    } else {
        if ($_GET["action"] == "deleteAccount") {
            if ($_SESSION['role'] == 'user') {
                include_once "view/Header.php";
            } else {
                include_once "view/modHeader.php";
            }
            include_once "view/confirmDeletUser.php";
        } elseif ($_GET["action"] == "deleteAccountConfirmed") {
            deleteAccount();
            include_once "logout.php";
        } else {
            $id = $_SESSION['id'];
            if ($_SESSION['role'] == 'user') {
                include_once "view/memberHeader.php";
            } else {
                include_once "view/modHeader.php";
            }
            $infoUser = getUserProfile();
            $userNumberOfProject = getUserNbParticipation();
            $userInvitations = getUserInvitationsOrRequest(0);
            $userRequests = getUserInvitationsOrRequest(1);
            include_once "view/profile.php";
        }
    }
}
