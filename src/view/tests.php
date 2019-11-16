<div class="container mt-3">

    <h4 class="mb-1">Tests du projet</h4>

    <div class="card mt-4">
        <div class="card-body">
            <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percFailed ?>%" aria-valuenow="<?php echo $percFailed ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $percFailed ?>%</div>
                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percDeprecated ?>%" aria-valuenow="<?php echo $percDeprecated ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $percDeprecated ?>%</div>
                <div class="progress-bar bg-secondary" role="progressbar" style="width: <?php echo $percNeverRun ?>%" aria-valuenow="<?php echo $percNeverRun ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $percNeverRun ?>%</div>
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percPassed ?>%" aria-valuenow="<?php echo $percPassed ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $percPassed ?>%</div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <div class="row">
            
                <div class="col-sm">
                    <h4>Filtres</h4>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" href="#failed" data-toggle="collapse" class="custom-control-input" id="displayfailed" checked>
                        <label for="displayfailed" class="custom-control-label">Échoués</label>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" href="#deprecated" data-toggle="collapse" class="custom-control-input" id="displaydeprecated" checked>
                        <label for="displaydeprecated" class="custom-control-label">Dépréciés</label>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" href="#neverrun" data-toggle="collapse" class="custom-control-input" id="displayneverrun" checked>
                        <label for="displayneverrun" class="custom-control-label">Jamais lancés</label>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" href="#passed" data-toggle="collapse" class="custom-control-input" id="displaypassed" checked>
                        <label for="displaypassed" class="custom-control-label">Passés</label>
                    </div>
                </div>

                <div class="col-sm">
                    <h4 class="text-dark card-link">Gestion</h4>
                    <a role="button" class="btn btn-primary mb-4 mr-2 confirmNewTestModalLink" data-target='#NewTestModal' href='index.php?action=newTest' data-toggle="modal">
                        Ajouter un nouveau test
                    </a>
                    <br>
                    <a role="button" class="btn btn-success mb-4 mr-2 confirmPassAll" data-target='#PassAll' href='index.php?action=passAllTests' data-toggle="modal">
                        Marquer tous les tests comme passés
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">

        <div id="addfailed">
                <div class="collapse show" id="failed">
                    <?php foreach ($testsFailed as $t) { 
                        $testId = $t['id'];
                    ?>
                        <div class="card border-danger mt-1" style="border: 1.5px solid;">
                            <div class="card-body" data-toggle="collapse" href="#collapse<?php echo $testId; ?>">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title"> <?php echo $t['name']; ?> </h5>
                                    <span><p class="text-secondary" style="display: inline;">Échoué&nbsp&nbsp</p> Dernière exécution le <?php echo date_format(date_create_from_format($defaultDateFormat, $t['last_run']), $desiredDateFormat); ?></span>
                                    <div>
                                        <a href="index.php?action=passTest&testId=<?php echo $testId ?>" class="btn">
                                            <em class="fas fa-check" style="color:#20CF2D" alt="Pass"></em>
                                        </a>
                                        <a href="index.php?action=failTest&testId=<?php echo $testId ?>" class="btn">
                                            <em class="fas fa-times" style="color:#C12F2F" alt="Fail"></em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapse<?php echo $testId; ?>">
                                <div class="card-body">
                                    <?php echo $t['description']; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div id="adddeprecated">
                <div class="collapse show" id="deprecated">
                    <?php foreach ($testsDeprecated as $t) { 
                        $testId = $t['id'];
                    ?>
                        <div class="card border-warning mt-1" style="border: 1.5px solid;">
                            <div class="card-body" data-toggle="collapse" href="#collapse<?php echo $testId; ?>">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title"> <?php echo $t['name']; ?> </h5>
                                    <span><p class="text-secondary" style="display: inline;">Déprécié&nbsp&nbsp</p> Dernière exécution le <?php echo date_format(date_create_from_format($defaultDateFormat, $t['last_run']), $desiredDateFormat); ?></span>
                                    <div>
                                        <a href="index.php?action=passTest&testId=<?php echo $testId ?>" class="btn">
                                            <em class="fas fa-check" style="color:#20CF2D" alt="Pass"></em>
                                        </a>
                                        <a href="index.php?action=failTest&testId=<?php echo $testId ?>" class="btn">
                                            <em class="fas fa-times" style="color:#C12F2F" alt="Fail"></em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapse<?php echo $testId; ?>">
                                <div class="card-body">
                                    <?php echo $t['description']; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div id="addneverrun">
                <div class="collapse show" id="neverrun">
                    <?php foreach ($testsNeverRun as $t) { 
                        $testId = $t['id'];
                    ?>
                        <div class="card border-secondary mt-1" style="border: 1.5px solid;">
                            <div class="card-body" data-toggle="collapse" href="#collapse<?php echo $testId; ?>">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title"> <?php echo $t['name']; ?> </h5>
                                    Jamais lancé
                                    <div>
                                        <a href="index.php?action=passTest&testId=<?php echo $testId ?>" class="btn">
                                            <em class="fas fa-check" style="color:#20CF2D" alt="Pass"></em>
                                        </a>
                                        <a href="index.php?action=failTest&testId=<?php echo $testId ?>" class="btn">
                                            <em class="fas fa-times" style="color:#C12F2F" alt="Fail"></em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapse<?php echo $testId; ?>">
                                <div class="card-body">
                                    <?php echo $t['description']; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div id="addpassed">
                <div class="collapse show" id="passed">
                    <?php foreach ($testsPassed as $t) { 
                        $testId = $t['id'];
                    ?>
                        <div class="card border-success mt-1" style="border: 1.5px solid;">
                            <div class="card-body" data-toggle="collapse" href="#collapse<?php echo $testId; ?>">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title"> <?php echo $t['name']; ?> </h5>
                                    <span><p class="text-secondary" style="display: inline;">Passé&nbsp&nbsp</p> Dernière exécution le <?php echo date_format(date_create_from_format($defaultDateFormat, $t['last_run']), $desiredDateFormat); ?></span>
                                    <div>
                                        <a href="index.php?action=passTest&testId=<?php echo $testId ?>" class="btn">
                                            <em class="fas fa-check" style="color:#20CF2D" alt="Pass"></em>
                                        </a>
                                        <a href="index.php?action=failTest&testId=<?php echo $testId ?>" class="btn">
                                            <em class="fas fa-times" style="color:#C12F2F" alt="Fail"></em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapse<?php echo $testId; ?>">
                                <div class="card-body">
                                    <?php echo $t['description']; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>

</div>


<script>
    $('#addfailed').change(function() {
        $this.stopPropagation();
        if($('#displayfailed').prop('checked')) {
            $('#addfailed').show();
        } else {
            $('#addfailed').hide();
        }
    });
    
    $('#deprecated').change(function() {
        if($('#displayfailed').prop('checked')) {
            $('#adddeprecated').show();
        } else {
            $('#adddeprecated').hide();
        }
    });
    
    $('#addneverrun').change(function() {
        if($('#displayneverrun').prop('checked')) {
            $('#addneverrun').show();
        } else {
            $('#addneverrun').hide();
        }
    });
    
    $('#addpassed').change(function() {
        if($('#displaypassed').prop('checked')) {
            $('#addpassed').show();
        } else {
            $('#addpassed').hide();
        }
    });
</script>
