<script src="{{ asset('assets/bower_components/select2/dist/js/select2.min.js') }}"></script>
<script src="https://cdn.sheetjs.com/xlsx-0.19.3/package/dist/xlsx.full.min.js"></script>


<script>
    $(document).ready(function () {
        $('.select2').select2();

        $('#clearFilter').click(function () {
            $('#employee_ids').val(null).trigger('change');
            $('#start_date').val(null);
            $('#end_date').val(null);
            $('#TotalWorkHours tbody').html("");
        });

        $('#selectAll').click(function () {
            $('#employee_ids > option').prop("selected", "selected");
            $('#employee_ids').trigger("change");
        });

        $('#quickSelect').click(function () {
            $("#quickSelectModal").modal("toggle");
        });

        $("#selectToday").click(function () {

            var today = new Date();
            var year = today.getFullYear();
            var month = (today.getMonth() + 1).toString().padStart(2, "0");
            var day = today.getDate().toString().padStart(2, "0");
            var startDate = year + "-" + month + "-" + day + " " + "00:00"
            var endDate = year + "-" + month + "-" + day + " " + "23:59"

            $("#start_date").val(startDate);
            $("#end_date").val(endDate);
            $("#quickSelectModal").modal("toggle");
        });

        $("#selectThisWeek").click(function () {
            var today = new Date();
            var firstDayOfWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - today.getDay());
            var lastDayOfWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() + (6 - today.getDay()));

            var year = firstDayOfWeek.getFullYear();
            var month = (firstDayOfWeek.getMonth() + 1).toString().padStart(2, "0");
            var day = firstDayOfWeek.getDate().toString().padStart(2, "0");
            var startOfWeek = year + "-" + month + "-" + day + " " + "00:00"

            year = lastDayOfWeek.getFullYear();
            month = (lastDayOfWeek.getMonth() + 1).toString().padStart(2, "0");
            day = lastDayOfWeek.getDate().toString().padStart(2, "0");
            var endOfWeek = year + "-" + month + "-" + day + " " + "23:59";

            $("#start_date").val(startOfWeek);
            $("#end_date").val(endOfWeek);
            $("#quickSelectModal").modal("toggle");
        });

        $("#selectThisMonth").click(function () {
            var today = new Date();
            var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
            var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

            var year = firstDayOfMonth.getFullYear();
            var month = (firstDayOfMonth.getMonth() + 1).toString().padStart(2, "0");
            var day = firstDayOfMonth.getDate().toString().padStart(2, "0");
            var startOfMonth = year + "-" + month + "-" + day + " " + "00:00"

            year = lastDayOfMonth.getFullYear();
            month = (lastDayOfMonth.getMonth() + 1).toString().padStart(2, "0");
            day = lastDayOfMonth.getDate().toString().padStart(2, "0");
            var endOfMonth = year + "-" + month + "-" + day + " " + "23:59";

            $("#start_date").val(startOfMonth);
            $("#end_date").val(endOfMonth);
            $("#quickSelectModal").modal("toggle");
        });

        $("#selectLastMonth").click(function () {
            var today = new Date();
            var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth() - 1, 1);
            var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 0);

            var year = firstDayOfMonth.getFullYear();
            var month = (firstDayOfMonth.getMonth() + 1).toString().padStart(2, "0");
            var day = firstDayOfMonth.getDate().toString().padStart(2, "0");
            var startOfMonth = year + "-" + month + "-" + day + " " + "00:00"

            year = lastDayOfMonth.getFullYear();
            month = (lastDayOfMonth.getMonth() + 1).toString().padStart(2, "0");
            day = lastDayOfMonth.getDate().toString().padStart(2, "0");
            var endOfMonth = year + "-" + month + "-" + day + " " + "23:59";

            $("#start_date").val(startOfMonth);
            $("#end_date").val(endOfMonth);
            $("#quickSelectModal").modal("toggle");
        });
    })




    function getWorkHours() {

        var data = {
            start_date: $("#start_date").val(),
            end_date: $("#end_date").val(),
            employee_ids: $("#employee_ids").val()
        };
        $('#TotalWorkHours tbody').html("");
        $.ajax({
            url: '{{ route('api.user.workday.report') }}',
            type: 'GET',
            data: data,
            success: function (response) {
                var html = '';
                $.each(response.totalWorkHours, function (key, item) {
                    html += '<tr>';
                    html += '<td>' + item.full_name + '</td>';
                    html += '<td>' + item.totalWorkTime + '</td>';
                    html += '<td>' + item.totalPermitTime + '</td>';
                    html += '<td>' + item.totalNetWorkTime + '</td>';
                    html += '<td>' + item.salary + '</td>';
                    html += '<td>' + calcSalary(item.totalNetWorkTime, item.salary).toFixed(2);
                    +
                        '</td>';
                    html += '</tr>';
                });
                $('#TotalWorkHours tbody').html(html);
            },
            error: function (response) {
                console.log(response);
            }
        })
    }

    function calcSalary(totalHours, salary) {
        var perHourAmount = salary / 26 / 9;
        return totalHours * perHourAmount;
    };
</script>

<script>
    const exportButton = $('#downloadExcel');
    const table = document.getElementById('TotalWorkHours');

    exportButton.click(function () {
      if (table.rows.length> 1) {
        const ws = XLSX.utils.table_to_sheet(table);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'SheetJS');
        XLSX.writeFile(wb, 'TotalWorkHours.xlsx');
      }
      else{
        alert("Lütfen önce filtreleme yapınız.");
      }
    });
</script>
