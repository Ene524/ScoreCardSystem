<script src="{{ asset('assets/bower_components/select2/dist/js/select2.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2();

    })

    function getWorkHours() {

        var data = {
            start_date : $("#start_date").val(),
            end_date : $("#end_date").val(),
            employee_ids : $("#employee_ids").val()
        };

        $.ajax({
            url: '{{route('api.user.workday.report')}}',
            type: 'GET',
            data: data,
            success: function (response) {
                var html = '';
                $.each(response.totalWorkHours, function (key, item) {
                    html += '<tr>';
                    html += '</tr>';
                });
                $('#TotalWorkHours tbody').html(html);
                console.log(html);

            },
            error: function (response) {
                swal("Something went wrong".response, {
                    icon: "error",
                    timer: 3000
                });
            }
        })
    }
</script>
