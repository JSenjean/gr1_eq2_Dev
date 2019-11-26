<div calss="row">
    <label for="urlGit">URL github</label>
    <input type="text" class="form-control" id="urlGit" value="<?php echo $gitUrl ?>">
    <button data-target='#addOrModifyUSToProjectModal' data-toggle="modal" class="btn btn-primary-outline" type="button" id="btn_get_repos">get all commits</button>
</div>

<div class="row pt-5">
    <div class="col-sm col-lg-4 accordion" id="repo_list">
    </div>
</div>


<script>
    var allCommits = new Array();

    function displayCommit() {
        var htmlToWrite = "";
        var compteur = 0;
        var nbResult = 0;
        $("#repo_list").html("");
        var dateStr;
        var date;
        allCommits.forEach(oneResult => {
            nbResult++;
            oneResult.forEach(oneCommit => {
                date = new Date(oneCommit.commit.author.date);
                htmlToWrite += "<div class='card' id='card" + oneCommit.sha + "'>"
                htmlToWrite += "<div class='card-header text-center' id='heading" + oneCommit.sha + "'>"
                htmlToWrite += "<button class='btn btn-link' type='button' data-toggle='collapse' data-target='#collapse" + oneCommit.sha + "' aria-expanded='false' aria-controls='collapse" + oneCommit.Sha + "'>"
                htmlToWrite += oneCommit.commit.author.name
                htmlToWrite += "</button>"
                htmlToWrite += "<h6 class='mb-0 text-center'>"
                htmlToWrite += date.toLocaleString();
                htmlToWrite += "</h6>"
                htmlToWrite += "</div>"
                htmlToWrite += "<div id='collapse" + oneCommit.sha + "' class='collapse' aria-labelledby='heading" + oneCommit.sha + "' data-parent='#accordionRole'>"
                htmlToWrite += "<div class='card-body'>" + oneCommit.commit.message + "</div>"
                htmlToWrite += "<div class='card-footer bg-white text-right'>"
                htmlToWrite += "<a class='btn btn-primary' href='"+oneCommit.html_url+"' target='_blank' role='button'>voir sur GitHub <i class='fas fa-arrow-right' style='color:white'></i></a>"
                htmlToWrite += "</div>"
                htmlToWrite += "</div>"
                htmlToWrite += "</div>"
                $("#repo_list").append(htmlToWrite);
                htmlToWrite = "";
                compteur++;
            });
        });
    }


    function getLastCommit(iteration,name,repo) {

        $.ajax({
            type: "GET",
            headers: {
                'Authorization': `token 288f795f97ebc8b6c5a487a4cec5e89f3f2eaef6`,
            },
            url: "https://api.github.com/repos/"+name+"/"+repo+"/commits?per_page=100&since=2019-11-24T08:00:00&page=" + iteration,
            dataType: "json",
            success: function(result) {
                allCommits[iteration] = result;
                if (result.length == 100) {
                    newIt = iteration + 1;
                    getLastCommit(newIt,name,repo);
                } else {
                    return displayCommit();

                }

            }
        });
    }
    $("#btn_get_repos").click(function() {
        var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
            '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
            '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
            '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator

        var urlGit = $("#urlGit").val();
        if (!pattern.test(urlGit)) {
            alert("ce n'est pas une url valide");
        }else {
           
            var urlPart = urlGit.split("/");
            
            name=urlPart[3];
            repo=urlPart[4];
            getLastCommit(1,name,repo);
        }
    });
</script>