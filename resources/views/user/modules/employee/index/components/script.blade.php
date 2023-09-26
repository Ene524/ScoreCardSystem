<script src="{{asset('assets/bower_components/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>


<script>
    $(document).ready(function () {

        $('#clearFilter').click(function () {
            window.location.href = '{{route('user.employee.index')}}';
        });
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
                            swal("İşlem tamamlandı", {
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






