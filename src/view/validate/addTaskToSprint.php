<div class="modal fade" id="createOrModifyTaskModal" tabindex="-1" role="dialog" aria-labelledby="createOrModifyTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createOrModifyTaskModalLabel">Créer une tâche</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeCross">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" data-toggle="validator" action="index.php?action=sprints" id="addNewTask">
                    <div class="form-group">
                        <label for="taskName" id="taskName"> Nom de la tâche : </label>
                        <input type="text" id="taskName" maxlength="50 " name="taskName" required>
                    </div>
                    <div>
                        <label for="taskDescription" id="taskDescription"> Description : </label>
                        <textarea type="textarea" id="taskDescription" class="form-control" name="taskDescription" required></textarea>
                    </div>
                    <div>
                        <label for="taskDod" id="taskDod"> Definition Of Done : </label>
                        <textarea type="textarea" id="taskDod" class="form-control" name="taskDod" required></textarea>
                    </div>
                    <div>
                        <label for="taskPredecessor" id="taskPredecessor"> Prédécesseur : </label>
                        <textarea type="textarea" id="taskPredecessor" class="form-control" name="taskPredecessor" required></textarea>
                    </div>
</br>
                    <div class="form-inline">
                        <div class="form-group row m-2">
                            <label for="taskTime">Durée :</label>
                            <select class="form-control" id="taskTimeValue" name="taskTimeValue">
                                <option value="0.5">0.5</option>
                                <option value="1">1</option>
                                <option value="1.5">1.5</option>
                                <option value="2">2</option>
                                <option value="2.5">2.5</option>
                                <option value="3">3</option>
                                <option value="3.5">3.5</option>
                                <option value="4">4</option>
                            </select>
                            <label for="taskUnit"> </label>
                        </div>
                        <div class="form-group row m-2">
                            <label for="taskMember">Membre :</label>
                            <select class="form-control" id="taskMember" name="taskMember">
                                <option value="0">aucun</option>
                                <?php foreach ($projectMembers as $member) : ?>
                                    <option value="<?php echo $member['id']; ?>"><?php echo $member['username']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button id="validate" type="input" class="btn btn-primary validate">Valider</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".addNewTask").on('submit', function(event) {
            alert('submit intercepted');
            event.preventDefault(event);
            console.log("coucou");
            /*
            var projectId = $(".projectID").attr('value');
            var dateStart = $(".startDate").attr('value');
            var dateEnd = $(".endDate").attr('value');
            var sprintN = $(".sprintName");
            *//*
                $.ajax({
                    type: 'POST',
                    url: 'index.php?action=sprints',
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
                });*/
        });
    });
</script>