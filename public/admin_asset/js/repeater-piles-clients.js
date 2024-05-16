$(document).ready(function () {

    var clientsLoop = 1;
    $("body").on("click", "#add-client", function () {
        console.log("add-client" + clientsLoop);
        $(".client-item-0").clone().appendTo(".clients-group").removeClass("clients-item-0")
            .removeClass("d-none").addClass("client-item-" + clientsLoop)
            .find("input[type='text']").val("");

        $('.client-item-' + clientsLoop + ' .delete-client-button').removeClass("d-none");

        $('.client-item-' + clientsLoop + ' .id').attr("name", "clients[" + clientsLoop + "][id]");
        $('.client-item-' + clientsLoop + ' .is_manager').attr("name", "clients[" + clientsLoop + "][is_manager]");
        $('.client-item-' + clientsLoop + ' .folder_id').attr("name", "clients[" + clientsLoop + "][folder_id]");

        clientsLoop++;

        $('#clients[' + clientsLoop + '][folder_id]').innerHTML = '';

        console.log('clients[' + clientsLoop + '][folder_id]')
        const selectElement = document.getElementById('clients[' + clientsLoop + '][folder_id]');
        selectElement.innerHTML = '';

        $(".percent_input").inputmask('Regex', {regex: "^[1-9][0-9]?$|^100$"});
    });



    $("body").on("click", ".delete-client-button", function () {
        $(this).parent().remove();
    });
});




$(document).ready(function () {
    $("#percent_input").inputmask('Regex', {regex: "^[1-9][0-9]?$|^100$"});
    $("#car_capital").inputmask('Regex', {regex: "^[0-9]{1,8}(\\.\\d{1,2})?$"});
});
