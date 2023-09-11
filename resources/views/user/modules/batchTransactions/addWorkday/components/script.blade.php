<script src="{{ asset('assets/bower_components/select2/dist/js/select2.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2();

    })

    $('#selectAll').click(function () {
        $('#employee_ids > option').prop("selected", "selected");
        $('#employee_ids').trigger("change");
    });

</script>






