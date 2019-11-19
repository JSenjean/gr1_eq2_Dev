<?php

function get_all_sprints($projectID)
{
  try {
    $bdd = dbConnect();
    $stmt = $bdd->prepare(
      "SELECT *
          FROM sprint
          WHERE project_id=:projectId
          ORDER BY start"
    );
    $stmt->execute(array(':projectId' => $projectID));
    return $stmt;
  } catch (PDOException $e) {
    echo  "<br>" . $e->getMessage();
    return -1;
  }
}

function add_sprint_background($startDate, $endDate)
{
  $curDate = new DateTime("now");
  $sDate = new DateTime($startDate);
  $eDate = new DateTime($endDate);

  if ($eDate < $curDate) {
    return "bg-success";
  } else if ($sDate <= $curDate && $eDate >= $curDate) {
    return "bg-danger";
  }
  return "bg-info";
}

function create_new_sprint($name, $start, $end, $projectId)
{
  try {
    $bdd = dbConnect();
    $stmt = $bdd->prepare(
      "INSERT INTO 
          sprint(end,start,name,project_id) 
          VALUES(:end,:start,:name,:project_id)"
    );
    $stmt->execute(array(
      'end'   => $end,
      'start' => $start,
      'name'  => $name,
      ':project_id' => $projectId
    ));
    return 1;
  } catch (PDOException $e) {
    echo  "<br>" . $e->getMessage();
    return -1;
  }
  return 1;
}

function delete_sprint_by_id($sprintId)
{
  try {
    var_dump($sprintId);
    $bdd = dbConnect();
    $stmt = $bdd->prepare(
      "DELETE FROM sprint
          WHERE id=:sprint_id"
    );
    $stmt->execute(array(
      'sprint_id' => $sprintId
    ));
    return 1;
  } catch (PDOException $e) {
    echo  "<br>" . $e->getMessage();
  }
  return 1;
}

function get_all_project_members_and_master($id) {
  try {
      $bdd = dbConnect();
      $stmt = $bdd->prepare(
          "SELECT user.username, user.id FROM user
              INNER JOIN project_member ON user.id = project_member.user_id
              WHERE project_member.project_id=:projectId;"
      );
      $stmt->execute(array('projectId' => $id));
      return $stmt;
  } catch (PDOException $e) {
      echo "<br>" . $e->getMessage();
  }
}

/* Task inside Sprint
 */
function create_new_task($name, $description, $dod, $predecessor, $time, $sprintId, $memberId) {
  try {
    $bdd = dbConnect();
    $stmt = $bdd->prepare(
      "INSERT INTO 
          task(sprint_id, member_id, name, predecessor, description, dod, state, time, maquette) 
          VALUES(:sprintId,:memberId,:name,:predecessor,:description,:dod,:state,:time,:maquette)"
    );
    $stmt->execute(array(
      'sprintId'    => $sprintId,
      'memberId'    => $memberId,
      'name'        => $name,
      'predecessor' => $predecessor,
      'description' => $description,
      'dod'         => $dod,
      'state'       => 'todo',
      'time'        => $time,
      'maquette'    => NULL
    ));
    return 1;
  } catch (PDOException $e) {
    echo  "<br>" . $e->getMessage();
    return -1;
  }
  return 1;
}

function get_all_task_inside_sprint($sprintId) {
  try {
      $bdd = dbConnect();
      $stmt = $bdd->prepare(
          "SELECT task.*
              FROM task  
              WHERE task.sprint_id=:sprintId"
      );
      $stmt->execute(array('sprintId' => $sprintId));
      return $stmt;
  } catch (PDOException $e) {
      echo "<br>" . $e->getMessage();
  }
}
