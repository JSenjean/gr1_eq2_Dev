<div class="container mt-3">
  <h4 class="mb-1">Sprints du projet</h4>
  <div class="container">
    <div class="row">
      <?php foreach ($sprints as $value) : $startD = $value['start'];
        $endD = $value['end']; ?>
        <div class="col-lg-3 sprint" data-sprintid="<?php echo $value['id'] ?>">
          <div class="card mt-4 sprintCard <?php $currentProjectBg = add_sprint_background($startD, $endD);
                                              echo $currentProjectBg ?>" style="width: 15rem;">
            <div class="card-header">
              <div class="row">
                <div class="col-lg-2">
                  <button class="btn btn-primary-outline float-left" type="button" style="background-color: transparent; border: none;">
                    <em class='fas fa-pen fa-xs' style="color:blue" title="Modifier Sprint"></em>
                </div>
                <div class="col">
                  <?php echo $value['name']; ?>
                </div>
                <div class="col-lg-2">
                  <button class="btn btn-primary-outline float-right deleteSprint" data-sprintid="<?php echo $value['id'] ?>" type="button" style="background-color: transparent; border: none;">
                    <em class='fas fa-times fa-xs' title="Modifier Sprint"></em>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="col">
                <div>
                  <p class="card-text">Début : <?php $startDate = date("j/m/Y", strtotime($startD));
                                                  echo $startDate; ?></p>
                </div>
                <div>
                  <p class="card-text">Fin : <?php $endDate = date("j/m/Y", strtotime($endD));
                                                echo $endDate; ?></p>
                </div>
                <div class="progress">
                  <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
  <div class="col ">
      <button class="btn btn-primary-outline bg-primary col-sm-12 createOrModifySprintModal" type="button" style="border: none;" data-target='#createOrModifySprintModal' data-toggle="modal" id="<?php echo $projectId; ?>">
        <em class='fas fa-plus fa-3x' style="color:white" title="CreateSprint"></em>
  </div>
  </div>
  </br>
  </br>
  <div class="container" id="taskInsideSprint" hidden>
    <!-- tasks View -->
    <div class="row">
      <div class="col-xl-2">
        <button class="btn bg-primary">Ajouter User Story</button>
      </div>
      <div class="col-xl-1">
        <button class="btn bg-primary createOrModifyTaskModal" type="button" data-target='#createOrModifyTaskModal' data-toggle="modal" id="createTask" data-sprintid="" data-projectid="<?php echo $projectId; ?>">Créer une tâche</button>
      </div>
    </div>
    </br>
    <div class="container-fluid table-sprint" id="table-sprint">
      <div class="row">
        <div class="col col-sm text-center US">
          <h5 class="firstCol">User Story</h5>
          <div class="card mt-1">
            <div class="card-header">US1</div>
            <div class="card-body">Description</div>
          </div>
        </div>
        <div class="col col-sm text-center Todo">
          <h5 class="firstCol">Todo</h5>

        </div>
        <div class="col col-sm text-center Doing">
          <h5 class="firstCol">Doing</h5>

        </div>
        <div class="col col-sm text-center Done">
          <h5 class="firstCol">Done</h5>

        </div>
      </div>
    </div>

  </div>

<link rel="stylesheet" href="sprints.css">
<script>
  $(".sprint").click(function() {
    $(".sprintCard").css("border", "0px");
    $(this).children($(".sprintCard")).css("border", "3px solid blue");
    $("#taskInsideSprint").removeAttr('hidden');

    var sprintId = $(this).data('sprintid');
    console.log(sprintId);
    $("#createTask").attr('data-sprintid', sprintId);

    $.ajax({
      type: 'POST',
      url: 'index.php?action=sprints',
      data: {
        getUS: true,
        sprintId: sprintId
      },
      success: function(response) {
        var tasks = JSON.parse(response);
        var htmlToWrite = "";
        tasks.forEach(function(item) {
          console.log(item);
          htmlToWrite += "<div class='card mt-2 task' data-taskid=" + item["id"] + " style='cursor:pointer'"
          htmlToWrite += "data-memberid=" + item['member_id'] + " data-name=" + item['name'] + "data-description=" + item['description'] + " data-dod=" + item['dod'] + " data-time=" + item['time'] + ">";
          htmlToWrite += "<div class='card-header'>" + item['name'] + "</div>";
          htmlToWrite += "<div class='card-body'>" + item['description'] + "</div>";
          htmlToWrite += "</div> "

          if (item["state"] === "todo") {
            $(".Todo").append(htmlToWrite);
          } else if (item["state"] === "onGoing") {
            $(".Doing").append(htmlToWrite);
          } else if (item["state"] === "done") {
            $(".Done").append(htmlToWrite);
          }
          htmlToWrite = "";
        });
      }
    })

    $.ajax({
      type: 'POST',
      url: 'index.php?action=sprints',
      data: {
        getTask: true,
        sprintId: sprintId
      },
      success: function(response) {
        var tasks = JSON.parse(response);
        var htmlToWrite = "";
        tasks.forEach(function(item) {
          console.log(item);
          htmlToWrite += "<div class='card mt-2 task' data-taskid=" + item["id"] + " style='cursor:pointer'"
          htmlToWrite += "data-memberid=" + item['member_id'] + " data-name=" + item['name'] + "data-description=" + item['description'] + " data-dod=" + item['dod'] + " data-time=" + item['time'] + ">";
          htmlToWrite += "<div class='card-header'>" + item['name'] + "</div>";
          htmlToWrite += "<div class='card-body'>" + item['description'] + "</div>";
          htmlToWrite += "</div> "

          if (item["state"] === "todo") {
            $(".Todo").append(htmlToWrite);
          } else if (item["state"] === "onGoing") {
            $(".Doing").append(htmlToWrite);
          } else if (item["state"] === "done") {
            $(".Done").append(htmlToWrite);
          }
          htmlToWrite = "";
        });
      }
    })



  });

  $(document).on("click", ".task", function() {
    $("#createOrModifyTaskModal").modal('show');

  })

  $(document).ready(function() {
    $(".deleteSprint").click(function(event) {
      event.stopPropagation();

      var r = confirm("Cette action est irréversible, confirmez-vous la suppression ?");
      if (r) {
        var sprintId = $(this).data('sprintid');
        var button = $(this);

        $.ajax({
          type: 'POST',
          url: 'index.php?action=sprints',
          data: {
            delete: true,
            sprintToDeleteId: sprintId
          },
          success: function(response) {
            button.closest('.sprint').remove();
          }
        })
      }
    })



  });
</script>