
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
            $('#adddeprecated').show();
        } else {
            $('#adddeprecated').hide();
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
