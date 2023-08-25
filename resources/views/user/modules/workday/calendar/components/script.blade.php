<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/calendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('assets/js/calendar/locales-all-min.js')}}"></script>


<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>


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

        nowIndicator: true,
        now: TODAY + "T{{ date('H:i:s') }}",

        initialView: "dayGridMonth",
        initialDate: TODAY,

        editable: false,
        dayMaxEvents: true,
        navLinks: true,

        dateClick: function (info)
        {
            $("#start").val(moment(info.date).format('YYYY-MM-DD HH:mm:ss'));
            $("#end").val(moment(info.date).format('YYYY-MM-DD HH:mm:ss'));
            $(".customizer-contain").addClass("open");
            $(".customizer-links").addClass("open");
            $('.customizer-contain').css('right', '0px');
        },

        eventClick: function (info)
        {
            $('.fc-popover-close').click();
        },

        events: function (info, successCallback) {
            $.ajax({
                url: '{{ route('api.user.permit.index') }}',
                type: 'get',
                data: {
                    startDate: info.startStr.valueOf(),
                    endDate: info.endStr.valueOf(),
                },
                success: function (response) {
                    var events = [];
                    $.each(response.permits, function (i, permit) {
                        events.push({
                            _id: permit.id,
                            id: permit.id,
                            title: permit.employee.full_name,
                            start: reformatDateForCalendar(permit.start),
                            end: reformatDateForCalendar(permit.end),
                            type: 'permit',
                            classNames: `bg-primary text-white cursor-pointer ms-1 me-1`,
                            backgroundColor: 'white',
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
        var employee_id = $("#employee_id").val();
        var start = $("#start").val();
        var end = $("#end").val();
        var permit_type_id = $('#permit_type_id').val();
        var description = $("#description").val();

        $.ajax({
            url: '{{route('user.permit.create')}}',
            type: 'POST',
            data: {
                employee_id: employee_id,
                start: start,
                end: end,
                permit_type_id: permit_type_id,
                description: description,
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
                console.log(response);
            }
        });
    });



    $(document).ready(function () {
        $('.customizer-contain').css('right', '-500px');
    })

    function closeForm() {
        $(".customizer-contain").removeClass("open");
        $('.customizer-contain').css('right', '-500px');
    }
</script>











