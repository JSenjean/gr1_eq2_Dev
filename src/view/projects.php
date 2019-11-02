<div class="row pt-5">
    
    <!-- Create and manage projects -->
    <div class="col-sm">
    <div class="card">
    <div class="card-body">

        <div class="clearfix">
            <h1 class="text-dark card-link">Mes Projets</h1>
            <a role="button" class="btn btn-primary mb-4 mr-2 confirmNewProjectModalLink" data-target='#NewProjectModal' href='index.php?action=newProject' data-toggle="modal">
                Créer un projet
            </a>
        </div>

        <div class="list-group">
            <?php foreach ($projects as $u) {?>

            <div class="list-group-item flex-column align-items-start">
                <div class="media">

                    <div class="media-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="mt-0"><?php echo $u['name']?></h5>
                            <h6 class="text-muted">
                                <span class="font-weight-bold">
                                    <?php if ($u['role'] == 'master') { ?>
                                        <i class='fas fa-crown' style="color:#F3E90A"></i>
                                    <?php } ?>
                                </span>
                            </h6>
                        </div>

                        <div class="d-flex justify-content-between">
                            <h6 class="text-muted">
                                <span class="font-weight-bold">
                                    <?php if ($u['role'] == 'master') { ?>
                                        <a href='index.php?action=addMemberToProject&projectId=<?php echo ($u['id']) ?>'>
                                            <i class='fas fa-plus-square' style="color:blue ; cursor:pointer" data-toggle="tooltip" data-placement="top" title="Ajouter des membres"></i>
                                        </a>
                                        <a data-target='#deleteProjectModal' href='index.php?action=projectDelete&projectId=<?php echo ($u['id']) ?>' data-toggle="modal" class="confirmDeleteProjectModalLink">
                                            <i class='fas fa-trash' style="color:red; cursor:pointer" data-toggle="tooltip" data-placement="top" title="Supprimer projet"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href='index.php?action=leaveProject&projectId=<?php echo ($u['id']) ?>'>
                                            <i class='fas fa-arrow-alt-circle-left	 ' style="color:red ; cursor:pointer" data-toggle="tooltip" data-placement="top" title="Quitter le projet"></i>
                                        </a>
                                    <?php } ?>
                                </span>
                            </h6>
                            <h6>
                                <span class="font-weight-bold">
                                    <a href='index.php?action=selectedProject&projectId=<?php echo ($u['id']) ?>'>
                                        <i class='fas fa-arrow-alt-circle-right	 ' style="color:green ; cursor:pointer" data-toggle="tooltip" data-placement="top" title="Accéder au projet"></i>
                                    </a>
                                </span>
                            </h6>
                        </div>
                    </div>

                </div>
            </div>

            <?php } ?>

        </div>

    </div>
    </div>
    </div>

    <br>

    <!-- Search a project -->
    <div class="col-sm">
    <div class="card">
    <div class="card-body">

    <div class="clearfix">

        <h1 class="text-dark card-link">Rechercher un projet</h1>
        <input class="form-control" type="text" placeholder="Rechercher Projet" aria-label="Search" id="myInputSearch">
        <br>
        
        <div class="list-group" id="projectSearchList">
            <?php foreach ($otherProjects as $u) {
                if ($u['visibility'] == 1) { ?>
                    <div class="list-group-item flex-column align-items-start" id="oneProject">
                        <div class="media">

                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mt-0" id="projectName"><?php echo $u['name']?></h5>
                                    <h6 class="test-muted">
                                        <span class="font-weight-bold">Chef du projet : </span>
                                        <?php echo ($u['username']); ?>
                                    </h6>
                                </div>
                                <br>
                                <div class="d-flex justify-content-between" id="test">
                                    <h6 class="text-muted">
                                        <span class="font-weight-bold" id="buttonJoinSpan">
                                            <a role="button" class="btn btn-success mb-4 mr-2" data-target='#JoinProject' href='' data-toggle="modal" id="patate">
                                                Demander à rejoindre
                                            </a>
                                        </span>
                                    </h6>
                                </div>
                            </div>

                        </div>
                    </div>
            <?php } } ?>
        </div>
    </div>

    </div>
    </div>
    </div>

    </body>

    </html>
    <script>
$(document).ready(function(){
  $("#myInputSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#projectSearchList #oneProject").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>