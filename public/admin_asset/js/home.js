$(document).ready(function () {

    $(".fk-datepicker").datepicker({
        changeYear: true, changeMonth: true, dateFormat: 'yy-mm-dd', yearRange: '2017:2024'
    });
    $(".fr-datepicker").datepicker({
        changeYear: true, changeMonth: true, dateFormat: 'yy-mm-dd', yearRange: '2017:2024'
    });
    $(".fa-datepicker").datepicker({
        changeYear: true, changeMonth: true, dateFormat: 'yy-mm-dd', yearRange: '2022:2030'
    });
    $(".fd-datepicker").datepicker({
        changeYear: true, changeMonth: true, dateFormat: 'yy-mm-dd', yearRange: '1970:2004'
    });

    $(".fd-current-datepicker").datepicker({
        changeYear: true, changeMonth: true, dateFormat: 'yy-mm-dd', yearRange: '2022:2024'
    });
    $(".fe-datepicker").datepicker({
        changeYear: true, changeMonth: true, dateFormat: 'yy-mm-dd', yearRange: '1980:2022'
    });
});

window.addEventListener('NoSelectedItemsAlert', event => {
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: event.detail.message,
        timer: 2500,
        timerProgressBar: false,
        showConfirmButton: false,
    })
});

window.addEventListener('show-delete-confirmation', event => {
    $('#modaldemo2').modal('show');

    $("body").removeClass("timer-alert");

    Swal.fire({
        title: 'هل أنت متأكد',
        text: "سوف يتم مسح الداتا نهائيا",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'نعم قم بالمسح',
        cancelButtonText: 'إلغاء'
    }).then((result) => {
        if (result.isConfirmed) {
            window.livewire.emit('deleteConfirmed');

            // Swal.fire(
            //     'Deleted!',
            //     'Your file has been deleted.',
            //     'success'
            // )
        }
    })
})

window.addEventListener('view-model-info', e => {
    var _button = $(e.relatedTarget);
    var result = "";
    var $row = $(_button).closest("tr"); // Find the row
    console.log($row)
    var $tds = $row.find("td");
    $.each($tds, function () {
        var t = $(this).attr('data-title');
        var v = $(this).text();
        result += '<div>' + t + ' : ' + v + '</div>';
    });
    console.log(result)
    $("#model-body").html(result);
    $("#modaldemo8").toggle({effect: "scale", direction: "horizontal"}).modal("show");

})
window.addEventListener('show-update-notification', event => {
    notif({
        msg: event.detail.message,
        type: event.detail.type,
    });
});
