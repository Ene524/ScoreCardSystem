<script src="{{asset('assets/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/bower_components/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/bower_components/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('assets/bower_components/fullcalendar/locales-all-min.js')}}"></script>
<script src="{{asset('assets/bower_components/select2/dist/js/select2.min.js')}}"></script>


<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>

<script>
    var todayDate = moment().startOf("day");
    var YM = todayDate.format("YYYY-MM");
    var YESTERDAY = todayDate.clone().subtract(1, "day").format("YYYY-MM-DD");
    var TODAY = todayDate.format("YYYY-MM-DD");
    var TOMORROW = todayDate.clone().add(1, "day").format("YYYY-MM-DD");
    var calendarEl = document.getElementById("calendar");


    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'tr',
        themeSystem: 'bootstrap5',
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
        },

        eventColor: '#337ab7',
        nowIndicator: true,
        now: TODAY + "T{{ date('H:i:s') }}",
        initialView: "dayGridMonth",
        initialDate: TODAY,

        editable: true,
        selectable: true,
        dayMaxEvents: true,
        navLinks: true,

        select: function (arg) {
            clearForm();
            $("#start_date").val(moment(arg.start).format('YYYY-MM-DD 09:00'));
            $("#end_date").val(moment(arg.end).add(-1, 'day').format('YYYY-MM-DD 18:00'));
            $(".modal").modal("show");
        },

        // dateClick: function (info) {
        //     console.log(info);
        //     clearForm();
        //     $("#start_date").val(moment(info.start).format('YYYY-MM-DD 09:00'));
        //     $("#end_date").val(moment(info.end).add(-1, 'day').format('YYYY-MM-DD 18:00'));
        //     $(".modal").modal("show");
        // },

        events: function (info, successCallback) {
            $.ajax({
                url: '{{ route('api.user.permit.index') }}',
                type: 'get',
                data: {
                    start_date: info.startStr.valueOf(),
                    end_date: info.endStr.valueOf(),
                },
                success: function (response) {
                    var events = [];

                    $.each(response.permits, function (i, permit) {
                        events.push({
                            _id: permit.id,
                            id: permit.id,
                            title: permit.employee.full_name,
                            start: reformatDateForCalendar(permit.start_date),
                            end: reformatDateForCalendar(permit.end_date),
                            type: 'permit',
                            classNames: `bg-primary text-white cursor-pointer ms-1 me-1`,
                            //borderColor: 'bg-primary',

                            permit_id: permit.id
                        });
                    });
                    successCallback(events);
                },
                error: function (response) {
                    console.log(response);
                }
            });
        },
    });

    function reformatDateForCalendar(date) {
        var formattedDate = new Date(date);
        return formattedDate.getFullYear() + '-' +
            String(formattedDate.getMonth() + 1).padStart(2, '0') + '-' +
            String(formattedDate.getDate()).padStart(2, '0') + 'T' +
            String(formattedDate.getHours()).padStart(2, '0') + ':' +
            String(formattedDate.getMinutes()).padStart(2, '0') + ':00';
    }

    calendar.render();
    $("#savePermit").click(function () {
        let employee_id = $("#employee_id").val();
        let start_date = $("#start_date").val();
        let end_date = $("#end_date").val();
        let permit_type_id = $('#permit_type_id').val();
        let description = $("#description").val();
        let permit_status_id = $("#permit_status_id").val();


        $.ajax({
            url: '{{route('user.permit.create')}}',
            type: 'POST',
            data: {
                employee_id: employee_id,
                start_date: start_date,
                end_date: end_date,
                permit_type_id: permit_type_id,
                description: description,
                permit_status_id: permit_status_id,
                _token: '{{csrf_token()}}'
            },
            success: function (response) {
                swal({
                    title: "İzinler",
                    text: "İzinler başarıyla yüklendi.",
                    icon: "success",
                    buttons: false,
                    timer: 1500,
                });
                closeForm();
                calendar.refetchEvents();
            },
            error: function (response) {
                alert(response.responseJSON.message);
            }
        });
    });

    function closeForm() {
        $(".modal").modal("hide");
    }

    function clearForm() {
        $("#employee_id").val('');
        $("#start").val('');
        $("#end").val('');
        $("#permit_type_id").val('');
        $("#description").val('');
    }
</script>











