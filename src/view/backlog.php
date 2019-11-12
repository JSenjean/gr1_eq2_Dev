<div class="container mt-3">
  <h4 class="mb-1">Rôles du projet</h4>

  <div class="accordion" id="accordionRole">
    <?php foreach ($roles as $role) : ?>
      <div class="card" id="card<?php echo $role["id"]; ?>">
        <div class="card-header" id="heading<?php echo $role["id"]; ?>">
          <h5 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $role["id"]; ?>" aria-expanded="true" aria-controls="collapse<?php echo $role["id"]; ?>">
              <?php echo $role["name"]; ?>
            </button>
          </h5>
        </div>
        <div id="collapse<?php echo $role["id"]; ?>" class="collapse" aria-labelledby="heading<?php echo $role["id"]; ?>" data-parent="#accordionRole">
          <div class="card-body">
            <?php echo $role["description"]; ?>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-danger removeRoleButton" data-roleid="<?php echo $role["id"]; ?>">
              Suppprimer
            </button>
            <button type="button" class="btn btn-primary" data-target='#addOrModifyRoleToProjectModal' data-toggle="modal" class="addOrModifyRoleToProjectLink" data-roleid="<?php echo $role["id"]; ?>" data-rolename="<?php echo $role["name"]; ?>" data-roleDescription="<?php echo $role["description"]; ?>" data-projectid="<?php echo $projectId; ?>" data-writeEndTo="card<?php echo $role["id"]; ?>">
              Modifier
            </button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="card">
    <div class="card-body" id="divAddRole">
      <button class="btn btn-primary btn-lg btn-block " type="button" data-target='#addOrModifyRoleToProjectModal' data-toggle="modal" class="addOrModifyRoleToProjectLink" data-projectid="<?php echo $projectId; ?>" data-writeEndTo="accordionRole">Ajouter un nouveaux rôle</button>
    </div>
  </div>
</div>
<h1 class="text-center">Team Design Section with Pure CSS Effect</h1>

<!-- User storys-->
<div class="container">
  <div class="row">

    <!--one US-->
    <div class="col-lg-4">
      <div class="userstory">

        <div class="userstory-front">
          <img src="http://placehold.it/110x110/9c27b0/fff?text=US1" class="img-fluid" />
          <h3>US1</h3>
          <p>Un role</p>
        </div>

        <div class="userstory-back">
          <div class="row">
            <div class="col">
              <button class="btn btn-primary-outline" type="button"><em class='fas fa-pen' style="color:blue" title="Modifier US"></em>
            </div>
            <div class="col">
              <button class="btn btn-primary-outline float-right" type="button"><em class='fas fa-times' style="color:red" title="Modifier US"></em>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!--team-1-->
  </div>
</div>
<link rel="stylesheet" href="backlog.css">
<script>
  $(document).ready(function() {

    $(document).on("click", ".removeRoleButton", function() {
      var r = confirm("Cette action est irréversible confirmez, vous la suppression ?");
      if (r) {
        var roleId = $(this).data('roleid');
        var button = $(this);
        $.ajax({
          type: 'POST',
          url: 'index.php?action=backlog',
          data: {
            removeRole: true,
            roleId: roleId

          },
          success: function(response) {
            button.closest('.card').remove();

          }
        })

      }

    })



  })
</script>