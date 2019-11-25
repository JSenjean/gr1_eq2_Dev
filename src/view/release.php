
<button data-target='#addOrModifyUSToProjectModal' data-toggle="modal" class="btn btn-primary-outline" type="button" id="btn_get_repos"> 
<ul id="repo_list">

</ul>
<div id="repo_count">
</div>
<script>
$("#btn_get_repos").click(function() {
    $.ajax({
        type: "GET",
        url: "https://api.github.com/users/google/repos",
        dataType: "json",
        success: function(result) {
            for(var i in result ) {
                $("#repo_list").append(
                    "<li><a href='" + result[i].html_url + "' target='_blank'>" +
                    result[i].name + "</a></li>"
                );
                console.log("i: " + i);
            }
            console.log(result);
            $("#repo_count").append("Total Repos: " + result.length);
        }
    });
});
</script>