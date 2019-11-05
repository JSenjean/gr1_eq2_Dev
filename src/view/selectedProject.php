<div class="row pt-5">

    <div class="col-sm">
        <div class="card">
            <div class="card-body">

                <div class="clearfix">
                    <h3 class="text-dark card-link">Gestion des membres</h1>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Membres</h5>
                        <?php foreach ($projectMaster as $pm) {
                            echo $pm['username']; 
                            break;
                        }
                        foreach ($members as $m) {
                            echo '<br>' . $m['username'];
                        } ?>                        
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Requêtes en attente</h5>
                        <?php foreach ($requests as $r) {
                            echo $r['username'] . '<br>';
                        } ?>     
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Invitations envoyées</h5>
                        <?php foreach ($invitations as $i) {
                            echo $i['username'] . '<br>';
                        } ?>     
                    </div>
                </div>

            </div>
        </div>
    </div>

    <br>

    <div class="col-sm">
        <div class="card">
            <div class="card-body">

                <div class="clearfix">
                    <h3 class="text-dark card-link">Suivi du projet</h1>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Sprint X</h5>
                        <p>[Barre de progression]</p>
                        <a href="#" class="btn btn-primary">Détails</a>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Tests</h5>
                        <p>[Barre de progression]</p>
                        <a href="#" class="btn btn-primary">Détails</a>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Documentation</h5>
                        <p>[Barre de progression]</p>
                        <a href="#" class="btn btn-primary">Détails</a>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <br>

    <div class="col-sm">
        <div class="card">
            <div class="card-body">

                <div class="clearfix">
                    <h3 class="text-dark card-link">Informations générales</h1>
                </div>

                <?php // Will be used later on with the edit info modal
                    $id = $projectId;
                    $name = 'Unknown Name';
                    $description = 'Unknown Description';
                    $visibility = -1;
                ?>

                <div class="card mt-4">
                    <div class="card-body">
                        <?php foreach ($project as $p) {
                            $name = $p['name'];
                            echo '<h5 style="display: inline">Nom : </h5><h6 style="display: inline">' . $name . '</h6><br><br>';
                            $description = $p['description'];
                            echo '<h5 style="display: inline">Description : </h5><br>' . $description . '<br><br>';
                            if ($p['visibility'] == 1){
                                $visibility = 1;
                                $v = 'Public';
                            }else {
                                $visibility = 0;
                                $v = 'Privé';
                            }
                            echo '<h5 style="display: inline">Visibilité : </h5>' . $v;
                            break;
                        } ?>                  
                    </div>
                </div>
                
                <br><button type="button" class="btn btn-outline-primary btn-sm float-left" data-toggle="modal" data-target="#editInfoModal">Éditer</button>

            </div>
        </div>
    </div>

<!-- EDIT INFORMATION -->
<div class="modal fade" id="editInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier les informations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" data-toggle="validator" action="index.php?action=editSelectedProject&projectId=<?php echo ($projectId) ?>">
          <div class="form-group">
            <label for="InputName">Nom</label>
            <input type="textfield" class="form-control" id="InputName" name="name" value="<?php echo $name?>" required>
          </div>
          <div class="form-group">
            <label for="InputDescription">Description</label>
            <input type="textfield" class="form-control" id="InputName" name="description" value="<?php echo $description?>" required>
          </div>
          <div class="form-group ml-4">
            <input class="form-check-input" type="checkbox" id="InputVisiblity" <?php if ($visibility == 1) { echo ' checked ';  } ?> name="visibility" value="<?php echo $visibility ?>">
            <label for="InputVisibility" name="visibility">Public ?</label>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>