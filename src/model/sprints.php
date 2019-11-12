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
  } else if ($sDate <= $curDate and $eDate >= $curDate) {
    return "bg-danger";
  }
  return "bg-info";
}
