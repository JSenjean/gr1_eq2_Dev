<?php

include_once("model/index.php");


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'signup') {
        include_once("controller/signup.php");
    }
    elseif ($_GET['action'] == 'login') {
        include_once("controller/login.php");
    }
    elseif ($_GET['action'] == 'profile') {
        include_once("controller/profile.php");
      }
    elseif ($_GET['action'] == 'projects') {
        include_once("controller/projects.php");
      }
} else {
    if (!isset($_SESSION['username'])) {
        include_once("view/index.php");
    }
}
