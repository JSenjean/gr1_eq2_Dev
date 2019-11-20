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
    


    
    public function test_add_inside_project_role()
    {
        clear_Database();
        $this->prepare_user_and_project();
        
        add_inside_project_role(1,"name","description");

        $bdd=dbConnect();

        $stmt = $bdd->prepare(
            "SELECT *
                FROM inside_project_role
                WHERE project_id=1"
        );
        $stmt->execute();
        $this->assertEquals(1,$stmt->rowCount());

        $roleInserted = $stmt->fetchAll();
        $this->assertEquals(8,sizeof($roleInserted[0]));
        $this->assertEquals(1,$roleInserted[0][0]);
        $this->assertEquals(1,$roleInserted[0][1]);
        $this->assertEquals("name",$roleInserted[0][2]);
        $this->assertEquals("description",$roleInserted[0][3]);



        //$this->clear_Database();

        //create_new_project();
    }

    public function test_get_all_inside_project_role()
    {
        
    }
}
