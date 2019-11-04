<div class="row pt-5">

    <div class="col-sm">
        <div class="card">
            <div class="card-body">

                <div class="clearfix">
                    <h3 class="text-dark card-link">Gestion des membres</h1>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Membres</h5>
                            <?php foreach ($projectMaster as $pm) { ?>
                                <?php echo $pm['username']; break; ?>
                            <?php } ?>
                            <?php foreach ($members as $m) { ?>
                                <?php echo $m['username'] ?>
                            <?php } ?>                        
                    </div>
                </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Requêtes en attente</h5>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Invitations envoyées</h5>

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

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sprint X</h5>
                        <p>[Barre de progression]</p>
                        <a href="#" class="btn btn-primary">Détails</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tests</h5>
                        <p>[Barre de progression]</p>
                        <a href="#" class="btn btn-primary">Détails</a>
                    </div>
                </div>

                <div class="card">
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



            </div>
        </div>
    </div>

    </body>