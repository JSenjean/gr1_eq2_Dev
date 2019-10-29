<a class="h1 text-dark card-link" href="index.php?action=profile">Profil</a>
<br><br>

<div class="row">

    <div class="col-sm-3 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $infoUser['first_name']?> <?php echo $infoUser['last_name']?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $infoUser['email']?></h6>
                </br>
                <div class="clearfix">
                    <button type="button" class="btn btn-outline-primary btn-sm float-left" data-toggle="modal" data-target="#editInfoModal">Modifier</button>
                    <a class="btn btn-outline-danger btn-sm float-right" href="index.php?action=deleteAccount" role="button">Fermer le compte</a>
                </div>
            </div>
        </div>
        </br>
        <div class="card">
            <div class="card-body p-3">
                <h6><?php $_SESSION['role']=="admin" ? print 'Administrateur' : ($_SESSION['role']=="moderator" ? print 'Modérateur' : print 'Membre') ?></h6>
                <p class="card-text">Inscrit le <?php $date = date("j/m/Y", strtotime($infoUser['reg_date'])); echo $date;?></p>
            </div>
        </div>
        </br>
    </div>

    <div class="col-sm-9 mx-auto">
        <div class="card">
            <div class="card-header">Projet</div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre de projets où je participe</label>
                        <input required class="form-control" name="title" type="text" value="<?php echo $userNumberOfProject[0] ?>" readonly>
                    </div>
            </div>
        </div>
        </br>
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
        <form method="POST" data-toggle="validator" action="index.php?action=profile&editInfo=1">
          <div class="form-group">
            <label for="InputLogin1">Identifiant</label>
            <input type="textfield" class="form-control" id="InputLogin1" name="username" value="<?php echo $infoUser['username']?>" required>
          </div>
          <div class="form-group form-row">
            <div class="col">
              <label for="InputPassword1">Prénom</label>
              <input type="textfield" class="form-control" id="InputFirstname" name="firstname" value="<?php echo $infoUser['first_name']?>" required>
            </div>
            <div class="col">
              <label for="InputPassword1">Nom</label>
              <input type="textfield" class="form-control" id="InputLastname" name="lastname" value="<?php echo $infoUser['last_name']?>" required>
            </div>

          </div>
          <div class="form-group form-row">
            <div class="col">
              <label for="InputPassword1">Email</label>
              <input type="email" class="form-control" id="InputEmail" name="email" value="<?php echo $infoUser['email']?>" required>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
          <a class="btn btn-link" href="index.php?action=resetPassword&enterMailResetPassword=1" role="button">Réinitialiser le mot de passe</a>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
