<div class="modal fade" id="linkUSToSprintModal" tabindex="-1" role="dialog" aria-labelledby="linkUSToSprintLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="linkUSToSprintLabel">Ajouter un sprint</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeCross">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" data-toggle="validator" action="index.php?action=sprint" id="LinkUsToSprint">
                    <div class="form-group">
                        <label for="UsName"> Choisir les User Story à ajouter : </label>
                        <select class="selectpicker" id="multSelect" multiple data-live-search="true">
                        <?php foreach ($us as $item) : ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['user_story_id']; ?></option>
                        <?php endforeach; ?>
                        </select>
                        <label for="us"><?php  ?></label>
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
    $(document).ready(function() {
        $('select').selectpicker();
        var projectId = null;
        var sprintId = null;


        $("#linkUSToSprintModal").on("shown.bs.modal", function(event) {
            var button = $(event.relatedTarget);
            projectId = button.data('projectid');
            sprintId = button.data('sprintid');


            $.ajax({
                type: 'POST',
                url: 'index.php?action=sprints',
                data: {
                    getUS: true,
                    sprintId: sprintId
                },
                success: function(response) {
                    var us = JSON.parse(response);

                    us.forEach(function(item) {
                        $('#multSelect').val(item['name']);
                    });
                    $('#multSelect').selectpicker('refresh');
                }
            })
        });
    });
</script>