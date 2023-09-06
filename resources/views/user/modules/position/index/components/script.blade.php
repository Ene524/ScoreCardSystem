<script src="{{asset('assets/bower_components/sweet-alert/sweetalert.min.js')}}"></script>


<script>
    $(document).ready(function () {
        $('.deletePosition').click(function () {
            let positionID = $(this).attr('data-id');
            let positionName = $(this).data('name');

            swal({
                title: positionName + " pozisyonunu silmek istediğinize emin misin?",
                icon: "error",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '{{route('user.position.delete')}}',
                        type: 'DELETE',
                        data: {
                            positionID: positionID,
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






