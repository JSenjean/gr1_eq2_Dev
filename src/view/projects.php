    <div class="row">
        <!-- mes projets -->
        <div class="col-lg-6 card my-custom-scrollbar bg-light">
            <div class="card-header row">
                <div class="col-md-8">
                    <h2>Mes projets </h2>
                </div>
                <div class="col-md-4 float-right">
                    <a data-target='#NewProjectModal' href='index.php?action=newProject' data-toggle="modal" class="confirmNewProjectModalLink">
                        <button class="float-sm-right btn-block btn btn-primary" type="button" data-target="#deleteProjectModal">
                            Nouveau projet
                            <i class='fas fa-plus-square' style="color:white ; cursor:pointer" data-toggle="tooltip" data-placement="top" title="Ajouter membre"></i>
                        </button>
                    </a>
                </div>
            </div>
            <?php
            foreach ($projects as $u) {
                //print_r($u);
                ?>
                <div class="card mt-3">
                    <div class="card-header row">
                        <h3>
                            <?php echo ($u['name']); //project name
                                ?>
                            <?php if ($u['role'] == 'master') { ?>
                                <i class='fas fa-crown' style="color:yellow"></i>
                            <?php
                                }
                                ?>
                    </div>

                    </h3>
                    <div class="card-footer " style="background-color: #E0DAD9">
                        <?php
                            if ($u['role'] == 'master') { ?>
                            <a data-target='#deleteProjectModal' href='index.php?action=projectDelete&projectId=<?php echo ($u['id']) ?>' data-toggle="modal" class="confirmDeleteProjectModalLink">
                                <i class='fas fa-trash' style="color:red; cursor:pointer" data-toggle="tooltip" data-placement="top" title="supprimer projet"></i>
                            </a>

                            <a href='index.php?action=addMemberToProject&projectId=<?php echo ($u['id']) ?>'>
                                <i class='fas fa-plus-square' style="color:blue ; cursor:pointer" data-toggle="tooltip" data-placement="top" title="Ajouter membre"></i>
                            </a>

                        <?php
                            } else {
                                ?>
                            <a href='index.php?action=selectedProject&projectId=<?php echo ($u['id']) ?>'>
                                <i class='fas fa-arrow-alt-circle-left	 ' style="color:red ; cursor:pointer" data-toggle="tooltip" data-placement="top" title="Entrer dans le projet"></i>
                            </a>
                        <?php } ?>
                        <a href='index.php?action=selectedProject&projectId=<?php echo ($u['id']) ?>'>
                            <i class='fas fa-arrow-alt-circle-right	 ' style="color:green ; cursor:pointer" data-toggle="tooltip" data-placement="top" title="Entrer dans le projet"></i>
                        </a>
                    </div>
                </div>
            <?php

            }
            ?>
        </div>


        <!-- search a project -->
        <div class="col-lg-6 border rounded my-custom-scrollbar bg-light ">

            <p> bla </i> bla</p>
        </div>
    </div>



    </body>

    </html>