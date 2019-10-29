<html>

<body>

    <div class="row">

        <div class="col-lg-6 border rounded my-custom-scrollbar bg-light">
            <?php
            foreach ($projects as $u) {
                //print_r($u);
                ?>
                <div class="border rounded">
                    <h1><?php echo ($u['name']); ?>
                    </h1>
                    <?php
                        if ($u['role'] == 'master') { ?>
                        <i class='fas fa-trash'  style="color:red"></i>
                        <i class='fas fa-crown' style="color:yellow"></i>
                        <i class='fas fa-plus-square' style="color:blue"></i>
                        

                        <?php
                            }
                            ?>
                    <i class='fas fa-arrow-alt-circle-right	 ' style="color:green"></i>

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