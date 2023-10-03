<script src="{{asset('assets/bower_components/sweet-alert/sweetalert.min.js')}}"></script>
<script src="https://cdn.sheetjs.com/xlsx-0.19.3/package/dist/xlsx.full.min.js"></script>
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

<script>
    const exportButton = $('#downloadExcel');
    const table = document.getElementById('workdayTable');


    exportButton.click(function () {
        if (table.rows.length > 1) {
            const clonedTable = table.cloneNode(true);
            const clonedTbody = clonedTable.querySelector('tbody');

            if (clonedTbody && clonedTbody.rows.length > 0) {
                clonedTbody.deleteRow(0);
                for (let i = 0; i < clonedTbody.rows.length; i++) {
                    // Son hücreyi (sütunu) kaldırın
                    clonedTbody.rows[i].deleteCell(clonedTbody.rows[i].cells.length - 1);
                }
            }

            // Excel dosyasını oluşturun
            const ws = XLSX.utils.table_to_sheet(clonedTable);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'SheetJS');
            XLSX.writeFile(wb, 'Çalışma Listesi.xlsx');
        } else {
            alert("Lütfen önce filtreleme yapınız.");
        }
    });
</script>




