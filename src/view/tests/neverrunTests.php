<div id="addnever_run">
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
                    <a role="button" class="btn btn-danger mb-4 mr-4 float-right confirmDeleteTestModalLink" data-target='#DeleteTestModal' data-id='<?php echo $testId; ?>' href='index.php?action=deleteTest' data-toggle="modal">Supprimer</a>
                    <a role="button" class="btn btn-primary mb-4 mr-2 float-right confirmEditTestModalLink" data-target='#EditTestModal' data-id='<?php echo $testId; ?>' href='index.php?action=editTest' data-toggle="modal">Modifier</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>