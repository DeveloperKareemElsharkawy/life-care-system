$(document).ready(function () {
    $('#client_id').on('change', function () {
        var client_id = this.value;
        if (client_id && client_id > 0) {
            $.ajax({
                url: destinations_by_client_id_url,
                type: "POST",
                data: {
                    client_id: client_id
                },
                cache: false,
                success: function (results) {
                    $("#state-dropdown").html(results);
                    $.each(results, function (i, destination) {
                        $("#destination_id").empty();
                        document.getElementById('price_per_ton').value = destination.price;
                        $('#destination_id').append($('<option>', {value: destination.id}).text(' من ' + destination.from_where + ' - إلى ' + destination.to_where + ' - ' + destination.price + ' جنيه '));
                    });
                }
            });
        }
    });

});
function edValueKeyPress() {
    var cargoWeight = document.getElementById('cargo_weight').value;
    var pricePerTon = document.getElementById('price_per_ton').value;
    var total = (+cargoWeight) * (+pricePerTon);
    document.getElementById('total_shipment').value = total;
}
