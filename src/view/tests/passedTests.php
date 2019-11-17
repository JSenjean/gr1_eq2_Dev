<div id="addpassed">
    <div class="collapse show" id="passed">
        <?php foreach ($testsPassed as $t) { 
            $id = $t['id'];
            $name = $t['name'];
            $description = $t['description'];
            $state = $t['state'];
        ?>
            <div class="card border-success mt-1" style="border: 1.5px solid;">
                <div class="card-body" data-toggle="collapse" href="#collapse<?php echo $id; ?>">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title"> <?php echo $name; ?> </h5>
                        <span><p class="text-secondary" style="display: inline;">Passé&nbsp&nbsp</p> Dernière exécution le <?php echo date_format(date_create_from_format('Y-m-d', $t['last_run']), 'd M Y'); ?></span>
                        <div>
                            <a href="#" class="btn" data-id='<?php echo $id; ?>' data-state='<?php echo $state; ?>' id="failThisTest">
                                <em class="fas fa-times" style="color:#C12F2F" alt="Fail"></em>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="collapse<?php echo $id; ?>">
                    <div class="card-body">
                        <?php echo $description; ?>
                    </div>
                    <a role="button" class="btn btn-danger mb-4 mr-2 float-right confirmDeleteTestModalLink" data-target='#DeleteTestModal' data-id='<?php echo $id; ?>' data-state='<?php echo $state; ?>' href='#' data-toggle="modal">Supprimer</a>
                    <a 
                        role="button" 
                        class="btn btn-primary mb-4 mr-4 float-right confirmEditTestModalLink" 
                        data-target='#EditTestModal' 
                        data-id='<?php echo $id; ?>'
                        data-name='<?php echo $name; ?>' 
                        data-description='<?php echo $description; ?>' 
                        data-state='<?php echo $state; ?>' 
                        href='#' 
                        data-toggle="modal"
                    >
                        Modifier
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>

    $(document).ready(function() {

        var testId = null;
        var testState = null;

        $('#failThisTest').on('click', function(event) {
            event.preventDefault(); // Prevent page from reloading
        
            testId = $('#failThisTest').attr('data-id');
            testState = $('#failThisTest').attr('data-state');
        
            $.ajax({
                type: "POST",
                url: 'index.php?action=tests',
                data: {
                    id: testId,
                    state: testState,
                    manageTest: 'fail'
                },
                success: function(response) {
                    refreshDiv(testState);
                    refreshDiv('failed');
                    refreshProgressBar();
                }
            })
        })

    })

</script>