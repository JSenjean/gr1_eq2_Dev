<div class="container mt-3">
  <h4 class="mb-1">Sprints du projet</h4>
  <div class="container">
    <div class="row">
      <?php foreach ($sprints as $value) : $startD = $value['start'];
        $endD = $value['end']; ?>
        <div class="col sprintToDelete">
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
      <div class="col">
        <div class="card w-50 h-50 mt-5 text-center">
          <button class="btn btn-primary-outline bg-primary col-sm-12 createOrModifySprintModal" type="button" style="border: none;" data-target='#createOrModifySprintModal' data-toggle="modal" id="<?php echo $projectId; ?>">
            <em class='fas fa-plus fa-3x' style="color:white" title="CreateSprint"></em>
        </div>
      </div>
    </div>
  </div>

</br>
</br>
  <div class="container" id="taskInsideSprint">
    <!-- tasks View -->
    <div class="row">
      <div class="col-xl-2">
        <button class="btn bg-primary">Ajouter User Story</button>
      </div>
      <div class="col-xl-1">
        <button class="btn bg-primary">Créer une Task</button>
      </div>
    </div>
</br>
    <div class="container-fluid table-sprint" id="table-sprint">
      <div class="row">
        <div class="col col-sm text-center US">
          <p class="firstCol">User Story</p>
          <div class="card">
            <div class="card-header">US1</div>
            <div class="card-body">Description</div>
          </div>
        </div> 
        <div class="col col-sm text-center Todo">
          <p class="firstCol">Todo</p>
          <div class="card">
            <div class="card-header">Task1</div>
            <div class="card-body">Description</div>
          </div>
        </div>
        <div class="col col-sm text-center Doing">
          <p class="firstCol">Doing</p>
          <div class="card">
            <div class="card-header">Task2</div>
            <div class="card-body">Description</div>
          </div>
        </div>
        <div class="col col-sm text-center Done">
          <p class="firstCol">Done</p>
          <div class="card">
            <div class="card-header">Task2</div>
            <div class="card-body">Description</div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<link rel="stylesheet" href="sprints.css">
<script>
  $(".sprintToDelete").click(function() {
    $(".sprintCard").css("border", "0px");
    $(this).children($(".sprintCard")).css("border", "3px solid blue");
    $("#taskInsideSprint").html($(this).html());
  });
  
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
            button.closest('.sprintToDelete').remove();
          }
        })
      }
    })
  });
</script>