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
        aspectRatio: 1.8,
        locale: 'tr',
        themeSystem: 'bootstrap5',
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
        },

        nowIndicator: true,
        now: TODAY + "T{{ date('H:i:s') }}",

        initialView: "dayGridMonth",
        initialDate: TODAY,

        editable: true,

        selectable: true,
        dayMaxEvents: true,
        navLinks: true,

        // select: function (arg) {
        //     clearForm();
        //     $("#start_date").val(moment(arg.start).format('YYYY-MM-DD 09:00'));
        //     $("#end_date").val(moment(arg.end).add(-1, 'day').format('YYYY-MM-DD 18:00'));
        //     $(".modal").modal("show");
        // },

        dateClick: function (info) {

            clearForm();
            $("#start_date").val(moment(info.date).format('YYYY-MM-DD 09:00'));
            $("#end_date").val(moment(info.date).format('YYYY-MM-DD 18:00'));
            $(".modal").modal("show");

        },

        datesSet: function (info) {
            getWorkDays();
        },

        events: []
    });



    calendar.render();

    $("#saveWorkday").click(function () {
        var employee_id = $("#employee_id").val();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var status = $('#permit_status_id').val();

        $.ajax({
            url: '{{route('user.workday.create')}}',
            type: 'POST',
            data: {
                employee_id: employee_id,
                start_date: start_date,
                end_date: end_date,
                status: status,
                _token: '{{csrf_token()}}'
            },
            success: function (response) {
                swal({
                    title: "Çalışma Günleri",
                    text: "Çalışma günleri başarıyla eklendi",
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

    function getWorkDays(){
        var startDate = reformatDateForCalendar(calendar.currentData.dateProfile.activeRange.start);
        var endDate = reformatDateForCalendar(calendar.currentData.dateProfile.activeRange.end);

        $.ajax({
            type: 'get',
            url: '{{ route('api.employee.dashboard.getWorkdays')}}',
            data: {
                startDate: startDate,
                endDate: endDate,
            },
            success: function (response) {
                console.log(response);
                $.each(calendar.getEvents(), function (i, event) {
                    if (event._def.extendedProps.type === 'workday') {
                        event.remove();
                    }
                });
                calendar.addEventSource({
                    events: $.map(response.response, function (workday) {
                        return {
                            _id: workday.id,
                            id: workday.id,
                            title: `Çalışma Günü`,
                            start: reformatDateForCalendar(workday.start_date),
                            end: reformatDateForCalendar(workday.end_date),
                            type: 'workday',
                            classNames: `bg-primary text-white cursor-pointer ms-1 me-1`,
                            backgroundColor: 'white',
                            //workday_id: `${workday.id}`
                        };
                    }),
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function reformatDateForCalendar(date) {
        var formattedDate = new Date(date);
        return formattedDate.getFullYear() + '-' +
            String(formattedDate.getMonth() + 1).padStart(2, '0') + '-' +
            String(formattedDate.getDate()).padStart(2, '0') + 'T' +
            String(formattedDate.getHours()).padStart(2, '0') + ':' +
            String(formattedDate.getMinutes()).padStart(2, '0') + ':00';
    }

    function closeForm() {
        $(".modal").modal("hide");
    }

    function clearForm() {
        $("#employee_id").val('');
        $("#start_date").val('');
        $("#end_date").val('');
        $("#status").val('');
    }
</script>











