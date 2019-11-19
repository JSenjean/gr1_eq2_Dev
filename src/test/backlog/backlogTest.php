<?php


require_once "../model/backlog.php";
require_once "../model/projects.php";
require_once "dbConnectTest.php";
use PHPUnit\Framework\TestCase;

class BacklogTest extends TestCase
{
    public function prepare_user_and_project()
    {
        $bdd=dbConnect();
        $req = $bdd->prepare('INSERT INTO user(username, first_name, last_name, password, email, role) VALUES(:username, :firstName, :lastName, :password, :email, :role)');
        $req->execute(array(
                                        'username' => "user1",
                                        'firstName' => "user1",
                                        'lastName' => "user1",
                                        'password' => "user1",
                                        'email' => "user1@user1.fr",
                                        'role' => 'user',
                                    ));

        create_new_project(1, "projetTestBacklog", "une description", 1);
    }
    public function clear_Database()
    {   //clean user
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
        $req = $bdd->prepare("ALTER TABLE project_member AUTO_INCREMENT = 1");
        $req->execute();

    }


    
    public function test_add_inside_project_role()
    {
        $this->prepare_user_and_project();
        $this->clear_Database();
        $bdd=dbConnect();

        //create_new_project();
    }
}
