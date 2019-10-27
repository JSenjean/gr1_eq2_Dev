<?php

    session_start();
    if(!isset($_SESSION['username'])){
        return;
    }
function dbConnect(){
        $config = parse_ini_file('config.ini');
        $bdd = new PDO("mysql:host=".$config['servername'].";dbname=".$config['dbname'].";charset=utf8", $config['username'], $config['password'], array ( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
        //$bdd = new PDO("mysql:host=localhost;dbname=projetweb2", 'root', '', array ( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
    ?>