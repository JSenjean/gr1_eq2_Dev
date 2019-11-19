<?php

    function dbConnect()
    {
        $config = parse_ini_file('configTest.ini');
        return $bdd = new PDO("mysql:host=".$config['servername'].";dbname=".$config['dbname'].";charset=utf8", $config['username'], $config['password'], array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
    }
