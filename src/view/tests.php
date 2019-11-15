<div class="container mt-3">

    <h4 class="mb-1">Tests du projet</h4>

    <div class="card mt-4">
        <div class="card-body">
            <p>[BARRE DE PROGRESSION]</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <div class="row">
            
                <div class="col-sm">
                    <h4>Filtres</h4>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" href="#failed" data-toggle="collapse" class="custom-control-input" id="displayfailed" checked>
                        <label for="displayfailed" class="custom-control-label">Échoués</label>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" href="#deprecated" data-toggle="collapse" class="custom-control-input" id="displaydeprecated" checked>
                        <label for="displaydeprecated" class="custom-control-label">Anciens</label>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" href="#neverrun" data-toggle="collapse" class="custom-control-input" id="displayneverrun" checked>
                        <label for="displayneverrun" class="custom-control-label">Jamais lancés</label>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" href="#passed" data-toggle="collapse" class="custom-control-input" id="displaypassed" checked>
                        <label for="displaypassed" class="custom-control-label">Passés</label>
                    </div>
                </div>

                <div class="col-sm">
                    <h4 class="text-dark card-link">Gestion</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editInfoModal">Ajouter un nouveau test</button>
                    <br><br>
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editInfoModal">Marquer tous les tests comme passés</button>
                </div>

            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">

            <div id="addfailed">
                <div class="collapse show" id="failed">
                    <p>TESTS ECHOUES</p>
                </div>
            </div>

            <div id="adddeprecated">
                <div class="collapse show" id="deprecated">
                    <p>TESTS TROP VIEUX</p>
                </div>
            </div>

            <div id="addneverrun">
                <div class="collapse show" id="neverrun">
                    <p>TESTS JAMAIS LANCES</p>
                </div>
            </div>

            <div id="addpassed">
                <div class="collapse show" id="passed">
                    <p>TESTS PASSES</p>
                </div>
            </div>

        </div>
    </div>

</div>


<script>
    $('#addfailed').change(function() {
        $this.stopPropagation();
        if($('#displayfailed').prop('checked')) {
            $('#addfailed').show();
        } else {
            $('#addfailed').hide();
        }
    });
    
    $('#deprecated').change(function() {
        if($('#displayfailed').prop('checked')) {
            $('#deprecated').show();
        } else {
            $('#deprecated').hide();
        }
    });
    
    $('#addneverrun').change(function() {
        if($('#displayneverrun').prop('checked')) {
            $('#addneverrun').show();
        } else {
            $('#addneverrun').hide();
        }
    });
    
    $('#addpassed').change(function() {
        if($('#displaypassed').prop('checked')) {
            $('#addpassed').show();
        } else {
            $('#addpassed').hide();
        }
    });
</script>
