<div class="modal fade" id="inviteToProjectModal" tabindex="-1" role="dialog" aria-labelledby="deleteProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProjectModalLabel">Ajouter des membres</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body ui-front">
                <form method="POST" data-toggle="validator" action="index.php?action=newProject">
                    <div class="form-group ">
                        <label for="userName"> Nom de l'utilisateur : </label>
                        <input type="text" id="userName" maxlength="50 " name="userName">
                        <button type="button" class="btn btn-secondary" id="addUser" name="addUser">ajouter</button>
                    </div>
                    <div class="form-group" id="userAdding">

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button id="confirmInviteToProject" type="input" class="btn btn-primary">Valider</button>

            </div>
            </form>
        </div>
    </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(document).ready(function() {
        var users = JSON.parse('<?php echo ($jsonUsers) ?>');
        var userForAutocomplete = [];
        users.forEach(function(element) {
            userForAutocomplete.push(element[0]);
        })
        //console.log(userForAutocomplete);
        $("#userName").autocomplete({
            source: userForAutocomplete
        });

        var nbUser = 0;
        $("#addUser").click(function(e) {
            $("#userAdding").append('<span class="bg-success m-1 rounded" id="' + nbUser + '"><span class="text-white m-2">' + $("#userName").val() + '<a href="#"><i class="fas fa-times removeUser" style="color:white ;cursor:pointer" id="' + nbUser + '"></i></a></span></span>');
            nbUser++;
            $("#userName").val('');
            userForAutocomplete.splice(userForAutocomplete.indexOf($("#userName").val()), 1);
            $("#userName").autocomplete("option", "source", userForAutocomplete);
        });





        // when you click on cross for delete user remove the user in the modal
        $(document).on("click", ".removeUser", function(e) {
            userForAutocomplete.push(($(this).parent().parent().text()));
            $('span[id=' + $(this).attr('id') + ']').remove();
            console.log(userForAutocomplete);
        })
        

        /*$("#userName").bind("autocompleteselect", function(event, ui) {
            // Remove the element and overwrite the classes var
            userForAutocomplete.splice(userForAutocomplete.indexOf(ui.item.value), 1);
            $(this).autocomplete("option", "source", userForAutocomplete);
        });*/
        /*$("a").click(function(e) {
            //console.log('span[id='+$(this).attr('id')+']');
            console.log("fils de pute");
        })*/
    })
</script>