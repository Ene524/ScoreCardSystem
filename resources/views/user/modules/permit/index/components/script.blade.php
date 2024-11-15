<script src="{{asset('assets/bower_components/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{ asset('assets/bower_components/select2/dist/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
        $('#clearFilter').click(function () {
            window.location.href = '{{route('user.permit.index')}}';
        });
        $('.deletePermit').click(function () {
            let permitID = $(this).attr('data-id');
            let employeeName = $(this).data('name');
            let permitStartDate = $(this).data('startdate');
            let permitEndDate = $(this).data('enddate');

            swal({
                title: employeeName +" personelinin " + permitStartDate+" - "+ permitEndDate +" tarihli izin kaydını silmek istediğine emin misin?",
                icon: "error",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '{{route('user.permit.delete')}}',
                        type: 'DELETE',
                        data: {
                            permitID: permitID,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (response) {
                            swal("İzin başarıyla silindi", {
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




