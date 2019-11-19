<div class="modal fade" id="createOrModifyTaskModal" tabindex="-1" role="dialog" aria-labelledby="createOrModifyTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createOrModifyTaskModalLabel">Créer une tâche</h5>
                <button type="button" class="close closeCrossTask" data-dismiss="modal" aria-label="Close" id="closeCrossTask">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" data-toggle="validator addNewTask" action="index.php?action=sprints" id="addNewTask">
                    <div class="form-group">
                        <label for="taskName"> Nom de la tâche : </label>
                        <input type="text taskName" id="taskName" maxlength="50 " name="taskName" required>
                    </div>
                    <div>
                        <label for="taskDescription"> Description : </label>
                        <textarea type="textarea taskDescription" id="taskDescription" class="form-control" name="taskDescription"></textarea>
                    </div>
                    <div>
                        <label for="taskDod"> Definition Of Done : </label>
                        <textarea type="textarea taskDod" id="taskDod" class="form-control" name="taskDod"></textarea>
                    </div>
                    <div>
                        <label for="taskPredecessor"> Prédécesseur : </label>
                        <textarea type="textarea taskPredecessor" id="taskPredecessor" class="form-control" name="taskPredecessor"></textarea>
                    </div>
                    </br>
                    <div class="form-inline">
                        <div class="form-group row m-2">
                            <label for="taskTime">Durée :</label>
                            <select class="form-control taskTimeValue" id="taskTimeValue" name="taskTimeValue">
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
                            <select class="form-control taskMember" id="taskMember" name="taskMember">
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
        var projectId = null;
        var sprintId = null;
        var taskName = null;
        var taskDescription = null;
        var taskDod = null;
        var taskPredecessor = null;
        var taskMember = null;
        var taskTime = null;
        var modify = false;

        $("#createOrModifyTaskModal").on("shown.bs.modal", function(event) {
            var button = $(event.relatedTarget);
            sprintId = button.data('sprintid');
            console.log(sprintId);

            if (typeof button.data('memberid') != 'undefined') {
                taskMember = button.data('memberid');
                taskName = button.data('name');
                taskDescription = button.data('description');
                taskDod = button.data('dod');
                taskTime = button.data('time');
                taskPredecessor = button.data('pred');
                modify = true;

                $("#taskName").val(taskName);
                $("#taskDescription").val(taskDescription);
                $("#taskDod").val(taskDod);
                $("#taskPredecessor").val(taskPredecessor);
                $('#taskMember').val(taskMember);
                $('#taskTimeValue').val(taskTime);
            } else {
                projectId = button.data('projectid');
            }
        });

        $("#addNewTask").on('submit', function(event) {
            event.preventDefault();

            taskName = $("#taskName").val();
            taskDescription = $("#taskDescription").val();
            taskDod = $("#taskDod").val();;
            taskPredecessor = $("#taskPredecessor").val();
            taskMember = $('#taskMember').val();;
            taskTime = $("#taskTimeValue").val();;

            $.ajax({
                type: 'POST',
                url: 'index.php?action=sprints',
                data: {
                    modify: modify,
                    newTaskName: taskName,
                    taskDescription: taskDescription,
                    taskDod: taskDod,
                    taskPredecessor: taskPredecessor,
                    taskMember: taskMember,
                    taskTime: taskTime,
                    sprintId: sprintId,
                    projectId: projectId
                },
                success: function(response) {
                    $('#closeCrossTask').click();
                },
            });
        });
    });
</script>