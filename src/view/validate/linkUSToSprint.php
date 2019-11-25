<div class="modal fade" id="linkUSToSprintModal" tabindex="-1" role="dialog" aria-labelledby="linkUSToSprintLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="linkUSToSprintLabel">Ajouter une User Story</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeCross">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" data-toggle="validator LinkUsToSprint" action="index.php?action=sprint" id="LinkUsToSprint">
                    <div class="form-group">
                        <!--<label for="UsName"> Choisir les User Story à ajouter : </label>-->
                        <select class="selectpicker multSelect" id="multSelect" name="multSelect" multiple data-live-search="true">
                        </select>
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

        $("#linkUSToSprintModal").on("shown.bs.modal", function(event) {
            var button = $(event.relatedTarget);
            projectId = button.data('projectid');
            sprintId = button.data('sprintid');

            $.ajax({
                type: 'POST',
                url: 'index.php?action=sprints',
                data: {
                    getAllUS: true,
                    projectId: projectId
                },
                success: function(response) {
                    var us = JSON.parse(response);
                    var htmlToWrite = "";
                    var where = ".multSelect";
                    us.forEach(function(item) {
                        htmlToWrite += "<option style='display: none;' value='" + item['id'] + "' >" + item['name'] + "</option>";
                    });
                    $(where).append(htmlToWrite);
                    
                    SelectChildren = $(".multSelect").parent().children("select").children();
                    for (let i = 0; i < SelectChildren.length; i++) {
                        $(SelectChildren[i]).show();
                    }
                    $('.multSelect').selectpicker('refresh');
                }
            })



            $.ajax({
                type: 'POST',
                url: 'index.php?action=sprints',
                data: {
                    linkedUS: true,
                    sprintId: sprintId
                },
                success: function(response) {
                    var us = JSON.parse(response);
                    us.forEach(function(item) {
                        $('.multSelect').val(item['id']);
                    });
                    $('.multSelect').selectpicker('refresh');
                }
            })
        });

        $("#LinkUsToSprint").on('submit', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            let USToLink = $('#multSelect').val();
            console.log(USToLink);

            $.ajax({
                type: 'POST',
                url: 'index.php?action=sprints',
                data: {
                    USToLink: true,
                    sprintId: sprintId
                },
                success: function(response) {
                }
            })
        });
    });
</script>