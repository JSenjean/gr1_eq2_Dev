<div class="container mt-3">
  <h4 class="mb-1">Sprints du projet</h4>
  <div class="container">
    <div class="row">
      <?php foreach ($sprints as $value) : $startD = $value['start']; $endD = $value['end'];?>
        <div class="col sprint" data-sprint_id="<?php echo $value['id'] ?>">
          <div class="card mt-4 sprintCard <?php echo add_sprint_background($startD, $endD); ?>" style="width: 15rem;">
            <div class="card-header"><?php echo $value['name']; ?></div>
            <div class="card-body">
              <div class="col">
                <div><p class="card-text">Début : <?php $startDate = date("j/m/Y", strtotime($startD)); echo $startDate; ?></p></div>
                <div><p class="card-text">Fin : <?php $endDate = date("j/m/Y", strtotime($endD)); echo $endDate; ?></p></div>
                <div><p class="card-text">[Barre de progression]</p></div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

</br>
  <div class ="container" id="taskInsideSprint">
  </div>
</div>
<script>
$(".sprint").click(function() {
  $(".sprintCard").css("border", "0px");
  $(this).children($(".sprintCard")).css("border", "3px solid blue");
  $("#taskInsideSprint").html($(this).html());
});
</script>