<div>

    <button data-target='#addOrModifyUSToProjectModal' data-toggle="modal" class="btn btn-primary-outline" type="button" id="btn_get_repos">get all commits</button>
</div>
<div>

    <ul id="repo_list">

    </ul>
</div>
<div id="repo_count">
</div>
<script>
    var allCommits = new Array();

    function displayCommit() {
        allCommits.forEach(oneResult => {

            oneResult.forEach(oneCommit => {
                $("#repo_list").append(
                        "<li><a href='" + oneCommit.html_url + "' target='_blank'>" +
                        oneCommit.commit.author.name + "</a></li>"
                    );
            })
        })
    }


    function getLastCommit(iteration) {


        $.ajax({
            type: "GET",
            headers: {
                'Authorization': `token 46a163d8a3e8a9c656756f4f8ab01b78db1bb7fd`,
            },
            url: "https://api.github.com/repos/JSenjean/gr1_eq2_Dev/commits?page=" + iteration,
            dataType: "json",
            success: function(result) {
                console.log(iteration)
                /*for (var i in result) {
                    $("#repo_list").append(
                        "<li><a href='" + result[i].sha + "' target='_blank'>" +
                        result[i].sha + "</a></li>"
                    );
                    //console.log("i: " + i);
                }*/
                //console.log(result);
                //nbCommit=("#repo_count").append("Total Repos: " + result.length);
                //nbCommit = result.length;

                allCommits[iteration] = result;
                if (result.length == 30) {
                    newIt = iteration + 1;
                    getLastCommit(newIt);
                } else {
                    return displayCommit();
                }

            }
        });
    }
    $("#btn_get_repos").click(function() {
        getLastCommit(0);
        console.log(allCommits);


        /*var allCommits = new Array();
        var iteration=0;
        do
        {
            iteration++;
            getLastCommit(allCommits,iteration);
        }while(allCommits[iteration-1].length==30)*/

    });
</script>