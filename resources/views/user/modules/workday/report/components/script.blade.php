<script src="{{ asset('assets/bower_components/select2/dist/js/select2.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2();

    })

    function getWorkHours() {

        var data = {
            start_date: $("#start_date").val(),
            end_date: $("#end_date").val(),
            employee_ids: $("#employee_ids").val()
        };
        $('#TotalWorkHours tbody').html("");
        $.ajax({
            url: '{{route('api.user.workday.report')}}',
            type: 'GET',
            data: data,
            success: function (response) {
                console.log(response);
                var html = '';
                $.each(response.totalWorkHours, function (key, item) {
                    html += '<tr>';
                    html += '<td>' +item.full_name+ '</td>';
                    html += '<td>' +item.totalWorkTime+ '</td>';
                    html += '<td>' +item.totalPermitTime+ '</td>';
                    html += '</tr>';
                });
                $('#TotalWorkHours tbody').html(html);
                console.log(html);
            },
            error: function (response) {
                console.log(response);
            }
        })
    }
</script>
