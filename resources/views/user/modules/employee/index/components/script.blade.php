<script src="{{asset('assets/bower_components/sweet-alert/sweetalert.min.js')}}"></script>


<script>
    $(document).ready(function () {
        $('.deleteEmployee').click(function () {
            let employeeID = $(this).attr('data-id');
            let employeeName = $(this).data('name');

            swal({
                title: employeeName + " personelini silmek istediğinize emin misin?",
                icon: "error",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '{{route('user.employee.delete')}}',
                        type: 'DELETE',
                        data: {
                            employeeID: employeeID,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (response) {
                            swal("Status changed successfully", {
                                icon: "success",
                                timer: 3000
                            });
                            $(this).closest('tr').fadeOut(1500, function () {
                                $(this).remove();
                            });
                        }.bind(this),
                        error: function (response) {
                            swal("Something went wrong".response, {
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






