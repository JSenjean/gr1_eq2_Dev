<div class="modal fade" id="inviteToProjectModal" tabindex="-1" role="dialog" aria-labelledby="deleteProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProjectModalLabel">Ajouter des membres</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" data-toggle="validator" action="index.php?action=newProject">
                    <div class="form-group">
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
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
$(document).ready(function () {
    var nbUser=0;
    $("#addUser").click(function(e) {
        $("#userAdding").append('<span class="bg-success m-1 rounded" id="'+nbUser+'"><span class="text-white m-2">'+$("#userName").val()+'<a href="#"><i class="fas fa-times removeUser" style="color:white ;cursor:pointer" id="'+nbUser+'"></i></a></span></span>');
        nbUser++;
    });
    $(document).on("click", ".removeUser",function(e) {
        $('span[id='+$(this).attr('id')+']').remove();
    })

    
    /*$("a").click(function(e) {
        //console.log('span[id='+$(this).attr('id')+']');
        console.log("fils de pute");
    })*/
})
</script>