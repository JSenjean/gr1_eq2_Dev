<div class="modal fade" id="addOrModifyUSToProjectModal" tabindex="-1" role="dialog" aria-labelledby="addOrModifyUSToProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOrModifyUSToProjectModalLabel">Créer une nouvelle User story</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeCrossUS">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" data-toggle="validator" action="index.php?action=backlog" id="newOrModifyUSForm">
                    <div class="form-inline">
                        <label for="USName">nom</label>
                        <input required class="form-control col-lg-2 ml-2" id="USName" name="USName" type="text">

                        <label class="ml-2" for="USRole">Rôle</label>
                        <select class="form-control ml-2" id="USRole" name="USRole">
                        </select>

                        <input class="form-check-input ml-2" type="checkbox" id="done">
                        <label class="form-check-label" for="done">
                            terminé ?
                        </label>
                    </div>


                    <div class="form-group m-1">
                        <label for="USICan"> je peux : </label>
                        <textarea type="textarea" class="form-control" id="USICan" name="USICan"></textarea>
                    </div>


                    <div class="form-group m-1">

                        <label for="USSoThat"> afin de : </label>
                        <textarea type="textarea" class="form-control" id="USSoThat" name="USSoThat"></textarea>
                    </div>


                    <div class="form-inline">
                        <div class="form-group row m-1">
                            <label for="USDifficulty">Effort :</label>
                            <select class="form-control" id="USDifficulty" name="USDifficulty">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="5">5</option>
                                <option value="8">8</option>
                                <option value="13">13</option>
                                <option value="21">21</option>
                                <option value="34">34</option>

                            </select>
                        </div>
                        <div class="form-group row m-1">
                            <label for="USWorkValue">Valeur métier :</label>
                            <select class="form-control" id="USWorkValue" name="USWorkValue">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                                <option value="very high">Very high</option>
                            </select>
                        </div>
                        <div class="form-group row m-1">
                            <label for="USSprint">Sprint :</label>
                            <select class="form-control" id="USSprint" name="USSprint">
                                <option value="0">aucun</option>
                                <?php foreach ($sprints as $sprint) : ?>
                                    <option value=" <?php echo $sprint["id"]; ?>"><?php echo $sprint["name"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button id="confirmNewRole" type="input" class="btn btn-primary">Valider</button>
            </div>


            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var writeEndTo;
        var roles;
        var projectId;
        $("#addOrModifyUSToProjectModal").on("shown.bs.modal", function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            projectId = button.data('projectid');
            writeEndTo = button.data('writeendto');
            writeEndTo = '#' + writeEndTo;

            $.ajax({
                type: 'POST',
                url: 'index.php?action=backlog',
                data: {
                    projectIdToModifyUS: projectId,
                    allRole: "exist"
                },
                success: function(response) {
                    $("#USRole").empty();
                    roles = JSON.parse(response);
                    $('#USRole').append($('<option>', {
                        value: 0,
                        text: "choisissez un role"
                    }));
                    $.each(roles, function(i, role) {
                        $('#USRole').append($('<option>', {
                            value: role.id,
                            text: role.name
                        }));
                    });
                },

            })
        })

        $("#newOrModifyUSForm").submit(function(event) {
            event.preventDefault();
            var name = $("#USName").val();
            var roleId = $("#USRole option:selected").val()
            var roleName = $("#USRole option:selected").text()
            var done = $("#done").is(':checked');
            var iCan = $("#USICan").val();
            var soThat = $("#USSoThat").val();
            var difficulty = $("#USDifficulty option:selected").val()
            var workValue = $("#USWorkValue option:selected").val()
            var sprint = $("#USSprint option:selected").val()
            //console.log(typeof difficulty);console.log(typeof workValue);console.log(typeof sprint);
            $.ajax({
                type: 'POST',
                url: 'index.php?action=backlog',
                data: {
                    projectIdToModifyUS: projectId,
                    modifyOrCreateUS: "exist",
                    name: name,
                    roleId: roleId,
                    done: done,
                    iCan: iCan,
                    soThat: soThat,
                    difficulty: difficulty,
                    workValue: workValue,
                    sprint: sprint

                },
                success: function(response) {
                    roleId;
                   
                    rolename = (roleName=="choisissez un role" ? "pas de role": roleName);

                    var htmlToWrite = '';
                    htmlToWrite += '<div class="col-lg-4" id="' + response + '">'
                    htmlToWrite += '<div class="userstory">'
                    htmlToWrite += '<div class="userstory-front">'
                    htmlToWrite += '<img src="http://placehold.it/110x110/9c27b0/fff?text=' + name + '" class="img-fluid" />'
                    htmlToWrite += '<p>effort: ' + difficulty + ' / Priorité: ' + workValue + ' </p>'
                    htmlToWrite += '<p>' + rolename + '</p>'
                    htmlToWrite += '</div>'
                    htmlToWrite += '<div class="userstory-back">';
                    htmlToWrite += '<div class="row">';
                    htmlToWrite += '<div class="col">'
                    htmlToWrite += '<button class="btn btn-primary-outline" type="button"><em class="fas fa-pen" style="color:blue" title="Modifier US"></em>'
                    htmlToWrite += '</div>'
                    htmlToWrite += '<div class="col">'
                    htmlToWrite += '<button class="btn btn-primary-outline float-right" type="button"><em class="fas fa-times" style="color:red" title="Modifier US"></em>'
                    htmlToWrite += '</div>'
                    htmlToWrite += '</div>'
                    htmlToWrite += '<span>'
                    htmlToWrite += '<p><strong>En tant que</strong> ' + rolename + '</p>'
                    htmlToWrite += '</span>'
                    htmlToWrite += ' <span>'
                    htmlToWrite += ' <p><strong>Je peux</strong>' + iCan + '</p>'
                    htmlToWrite += '</span>'
                    htmlToWrite += '<span>'
                    htmlToWrite += '<p><strong>Afin De </strong>' + soThat + '</p>'
                    htmlToWrite += '</span>'
                    htmlToWrite += '</div>'
                    htmlToWrite += '</div>'
                    htmlToWrite += '</div>'

                                $(writeEndTo).append(htmlToWrite);
                                $('#closeCrossUS').click();
                },

            })

        })



    })
</script>