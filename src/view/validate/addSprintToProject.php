<div class="modal fade" id="createOrModifySprintModal" tabindex="-1" role="dialog" aria-labelledby="createOrModifySprintModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createOrModifySprintModalLabel">Ajouter un sprint</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeCross">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" data-toggle="validator" action="index.php?action=addSprint" id="CreateNewSprint">
                    <div class="form-group">
                        <label for="sprintName" id="sprintName"> Nom du sprint : </label>
                        <input type="text" id="sprintName" maxlength="50 " name="sprintName" required>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class='row'>
                                <div class="col">
                                    <p>Date de début :</p>
                                    <input type="date" class="form-control" id="startDate" name="startDate" value="<?php $curDate = date("Y-m-d");
                                                                                                                    echo $curDate; ?>" required />
                                </div>
                                <div class="col">
                                    <p>Date de Fin :</p>
                                    <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo $curDate; ?>" required />
                                </div>
                                <div>
                                    <input type="hidden" id="projectID" name="projectID" value="<?php echo $projectId ?>" required />
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button id="validate" type="input" class="btn btn-primary validate">Valider</button>
            </div>
            </form>-
        </div>
    </div>
</div>
<script>
    /*
    $(document).ready(function() {
        $(".validate").click(function() {
            var projectId = $(".projectID").attr('value');
            var dateStart = $(".startDate").attr('value');
            var dateEnd = $(".endDate").attr('value');
            var sprintN = $(".sprintName");

                $.ajax({
                    type: 'POST',
                    url: 'index.php?action=addSprint',
                    data: {
                        sprintName : sprintN,
                        startDate: dateStart, 
                        endDate: dateEnd,
                        projectId: projectId
                    },
                    success: function(response) {
                        if (response == 1) {
                            alert("oui");
                        }
                    },
                });
        });
    });*/
</script>