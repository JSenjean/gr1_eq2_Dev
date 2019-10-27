<?php

include_once("model/index.php");


if (isset($_GET['action'])) { } 
else {
    if (!isset($_SESSION['username'])) {
        include_once("view/index.php");
    }
}
