    <div class="row">

        <div class="col-lg-6 border rounded my-custom-scrollbar bg-light">
            <?php
            foreach ($projects as $u) {
                print_r($u);
                ?>
                <div class="border rounded">
                    <h1><?php echo ($u['name']); ?>
                    <?php
                        if ($u['role'] == 'master') { ?>
                    <i class='fas fa-crown' style="color:yellow"></i>
                    <?php
                        }
                        ?>
                    </h1>
                    <?php
                        if ($u['role'] == 'master') { ?>
                        <a data-target='#deleteProjectModal' href='index.php?action=projectDelete&projectId=<?php echo ($u['id']) ?>' data-toggle="modal" class="confirmDeleteProjectModalLink">
                            <i class='fas fa-trash' style="color:red; cursor:pointer" data-toggle="tooltip" data-placement="top" title="supprimer projet"></i>
                        </a>
                        
                        <a href='index.php?action=addMemberToProject&projectId=<?php echo ($u['id']) ?>'>
                        <i class='fas fa-plus-square' style="color:blue ; cursor:pointer" data-toggle="tooltip" data-placement="top" title="Ajouter membre" ></i>
                        </a>

                    <?php
                        }
                        ?>
                    <a href='index.php?action=selectedProject&projectId=<?php echo ($u['id']) ?>'>
                    <i class='fas fa-arrow-alt-circle-right	 ' style="color:green ; cursor:pointer" data-toggle="tooltip" data-placement="top" title="Entrer dans le projet"></i>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="col-lg-6 border rounded my-custom-scrollbar bg-light ">

            <p> bla </i> bla</p>
        </div>
    </div>



</body>

</html>