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
