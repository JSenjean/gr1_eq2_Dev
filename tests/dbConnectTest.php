<?php

    function dbConnect()
    {
        $config = parse_ini_file('configTest.ini');
        return $bdd = new PDO("mysql:host=".$config['servername'].";dbname=".$config['dbname'].";charset=utf8", $config['username'], $config['password'], array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
    }

    function clear_Database()
    {   
	

	//clean user
        $bdd=dbConnect();
        $req = $bdd->prepare("DELETE FROM user");
        $req->execute();
        $req = $bdd->prepare("ALTER TABLE user AUTO_INCREMENT = 1");
        $req->execute();

        //clean project
        $req = $bdd->prepare("DELETE FROM project");
        $req->execute();
        $req = $bdd->prepare("ALTER TABLE project AUTO_INCREMENT = 1");
        $req->execute();

	
        //clean project_member
        $req = $bdd->prepare("DELETE FROM project_member");
        $req->execute();
        $req = $bdd->prepare("ALTER TABLE project_member AUTO_INCREMENT = 1");
        $req->execute();

        //clean inside_project_role
        $req = $bdd->prepare("DELETE FROM inside_project_role");
        $req->execute();
        $req = $bdd->prepare("ALTER TABLE inside_project_role AUTO_INCREMENT = 1");
        $req->execute();

	//clean user_story
        $req = $bdd->prepare("DELETE FROM user_story");
        $req->execute();
        $req = $bdd->prepare("ALTER TABLE user_story AUTO_INCREMENT = 1");
        $req->execute();


    }
