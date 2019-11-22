<?php


require_once "src/model/backlog.php";
require_once "src/model/projects.php";
require_once "tests/dbConnectTest.php";
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    public function prepare_users()
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
                                    $req = $bdd->prepare('INSERT INTO user(username, first_name, last_name, password, email, role) VALUES(:username, :firstName, :lastName, :password, :email, :role)');
        $req->execute(array(
                                        'username' => "user2",
                                        'firstName' => "user2",
                                        'lastName' => "user2",
                                        'password' => "user2",
                                        'email' => "user2@user2.fr",
                                        'role' => 'user',
                                    ));
    }
    


    
    public function test_create_new_project()
    {
        clear_Database();
        $this->prepare_user();

        create_new_project(1, "projetTestBacklog", "une description", 1);

        $bdd=dbConnect();

        $stmt = $bdd->prepare(
            "SELECT *
                FROM project"
        );


        $stmt->execute();
        $this->assertEquals(1,$stmt->rowCount());

        $projectsInserted = $stmt->fetchAll();
        $this->assertEquals(10,sizeof($projectsInserted[0]));
        $this->assertEquals(1,$projectsInserted[0]["id"]);
        $this->assertEquals(1,$projectsInserted[0]["user_id"]);
        $this->assertEquals("projetTestBacklog",$projectsInserted[0]["name"]);
        $this->assertEquals("une description",$projectsInserted[0]["description"]);
        $this->assertEquals(1,$projectsInserted[0]["public"]);

        $stmt = $bdd->prepare(
            "SELECT *
                FROM project_member
                WHERE project_id=1 "
        );


        $stmt->execute();

        $this->assertEquals(1,$stmt->rowCount());

        $memberInserted = $stmt->fetchAll();
        $this->assertEquals(8,sizeof($memberInserted[0]));
        $this->assertEquals(1,$memberInserted[0]["id"]);
        $this->assertEquals(1,$memberInserted[0]["project_id"]);
        $this->assertEquals(1,$memberInserted[0]["user_id"]);
        $this->assertEquals("master",$memberInserted[0]["role"]);



        //$this->clear_Database();

        //create_new_project();
    }
    /*
    @depends test_create_new_project
    */
    public function test_associat_project_and_user()
    {
        associat_project_and_user(2, 1, "user");
        $bdd=dbConnect();

        $stmt = $bdd->prepare(
            "SELECT *
                FROM project_member
                WHERE project_id=1 "
        );


        $stmt->execute();

        $this->assertEquals(2,$stmt->rowCount());

        $memberInserted = $stmt->fetchAll();
        $this->assertEquals(8,sizeof($memberInserted[1]));
        $this->assertEquals(2,$memberInserted[1]["id"]);
        $this->assertEquals(1,$memberInserted[1]["project_id"]);
        $this->assertEquals(2,$memberInserted[1]["user_id"]);
        $this->assertEquals("user",$memberInserted[1]["role"]);

    }


}
