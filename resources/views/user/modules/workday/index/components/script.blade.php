<script src="{{asset('assets/bower_components/sweet-alert/sweetalert.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#clearFilter').click(function () {
            window.location.href = '{{route('user.workday.index')}}';
        });

        $('.deleteWorkday').click(function () {
            let workdayID = $(this).attr('data-id');
            let employeeName = $(this).data('name');
            let workdayStartDate = $(this).data('startdate');
            let workdayEndDate = $(this).data('enddate');

            swal({
                title: employeeName +" personelinin " + workdayStartDate+" - "+ workdayEndDate +" tarihli çalışma kaydını silmek istediğine emin misin?",
                icon: "error",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '{{route('user.workday.delete')}}',
                        type: 'DELETE',
                        data: {
                            workdayID: workdayID,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (response) {
                            console.log(response);
                            swal("Çalışma günü başarıyla silindi", {
                                icon: "success",
                                timer: 3000
                            });
                            $(this).closest('tr').fadeOut(1500, function () {
                                $(this).remove();
                            });
                        }.bind(this),
                        error: function (response) {
                            console.log(response);
                            swal("Bir sorun oluştu".response, {
                                icon: "error",
                                timer: 3000
                            });
                        }
                    })
                }
            });

        })
    })
</script>




